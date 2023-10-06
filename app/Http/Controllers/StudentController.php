<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Exception;
use Illuminate\Http\Request;
use App\Models\StudentModel;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
class StudentController extends Controller
{
   

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  
   
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
       
        ]);
        try{
        $store = new StudentModel();
        $store->name = $request->get('name');
        $store->email = $request->get('email');
        $store->password = Hash::make($request->get('password'));
        $store->save();

        }catch(Exception $exception){

       return back()->withError($exception->getMessage())->withInput();
        }
        Session::flash('message', ' Added Successfully');
         return redirect('home');
      
    }

    public function show(Request $request)
    {
      
        if ($request->ajax()) {
            $data = StudentModel::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                        $temp = '<a href="' . route('update-user', ['id' => $row->id]) . '" class="editBtn"><i class="fa-solid fa-pen-to-square" style="color: #4a7ed9;"></i></a>';


                        $temp = $temp.' <a href="javascript:void(0)"  data-delete_id="'.$row->id.'" class=" delete-users" id="openEditForm"><i class="fa-solid fa-trash" style="color: #cc2424;"></i></a>';
                       
                      return $temp;

                            
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
       
                
        
            return view('display');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        // $data = StudentModel::find(decrypt($id));
        // return view('update-user',['data'=>  $data]);
try{
        $data = StudentModel::findOrFail($id);
        
    }catch(Exception $exception){

        return back()->withError($exception->getMessage())->withInput();
         }
        return view('update-user', compact('data'));

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
        ]);
    
        try {
            $user = StudentModel::findOrFail($id);
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')), // Hash the password
            ]);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        Session::flash('message', 'Updated Successfully');

        return redirect('display'); // Use named route
    }
    

    public function destroyUser(Request $request)
    {
        try{
        $delete_id = $request->delete_id;
    
        // Find the record to delete
        $delete = StudentModel::find($delete_id);
    
        if (!is_null($delete)) {
            
            $delete->delete();
            Session::flash('message', ' Deleted Successfully');
            return view('display');
        } 
    }catch(Exception $exception){

        return back()->withError($exception->getMessage())->withInput();
         }
    }

    public function exportExcel(Request $request){

        try{
        return Excel::download(new UsersExport, 'user.xlsx');
    }catch(Exception $exception){

        return back()->withError($exception->getMessage())->withInput();
         }
    }
     
}