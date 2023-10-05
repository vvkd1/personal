<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Models\StudentModel;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

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
        
        $store = new StudentModel();
        $store->name = $request->get('name');
        $store->email = $request->get('email');
        $store->password = Hash::make($request->get('password'));
        $store->save();

        // echo "<script> alert('data inserted successfully')</script>";

         return redirect('home');

      
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function show(Request $request)
    {
      
        if ($request->ajax()) {
            $data = StudentModel::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                        $temp = '<a href="/update-user/'. $row->id .'" class="editBtn"><i class="fa-solid fa-pen-to-square" style="color: #4a7ed9;"></i></a>';

                        $temp = $temp.' <a href="javascript:void(0)"  data-delete_id="'.$row->id.'" class=" delete-users"><i class="fa-solid fa-trash" style="color: #cc2424;"></i></a>';
       
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

        $data = StudentModel::findOrFail($id);
        return view('update-user', compact('data'));

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
       
        ]);

    //    $data = StudentModel::find($id);
    //    $data->name = $request->name;
    //    $data->email = $request->email;
    //    $data->password = Hash::make($request->password);
    //    $data->save();
    //    return redirect('display');

    $user = StudentModel::findOrFail($id);
    
        $user->name = $request->input('name');
        $user->email =  $request->input('email');
        $user->password  =  Hash::make($request->password);
        $user->save();

    return redirect()->route('display')->with('success', 'User updated successfully');
    }



    public function destroyUser(Request $request)
    {
        $delete_id = $request->delete_id;
    
        // Find the record to delete
        $delete = StudentModel::find($delete_id);
    
        if ($delete) {
            // Delete the record
            $delete->delete();
            return view('display');
        } 
    }

    public function exportExcel(Request $request){

        
        return Excel::download(new UsersExport, 'users.xlsx');
      
    }
     
}

