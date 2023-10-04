<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
class StudentController extends Controller
{
   

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
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
            $data = StudentModel::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                        $temp = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">edit</a>'."  ";
                      
                        $temp = $temp.'<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">delete</a>';

       
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
        
        $data = StudentModel::find(decrypt($id));
        
        return view('update-user',['data'=>  $data]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
       
        ]);

       $data = StudentModel::find($id);
       $data->name = $request->name;
       $data->email = $request->email;
       $data->password = Hash::make($request->password);
       $data->save();
       return redirect('display');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
       
        $delete = StudentModel::find($id);
        $delete->delete();
        // return redirect('display');
        return redirect()->back()->with('message', 'Data Delete Successfully');
      

    }
}
