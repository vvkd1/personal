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
            $data = StudentModel::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                        $temp = '<a href="" ><i class="fa-solid fa-pen-to-square" style="color: #4a7ed9;"></i></a>'."  ";
                      
                      
                        $temp = $temp.' <a href="javascript:void(0)"  data-delete_id="'.$row->id.'" class=" delete-users"><i class="fa-solid fa-trash" style="color: #cc2424;"></i></a>';
       
                      return $temp;
                      
                            
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
       
        
            return view('display');
            return datatables()
            ->of($query)
            ->addColumn('serial_number', function ($record) {
                // Calculate the serial number based on the record's position in the result set
                return ++$request->start;
            })
            ->make(true);
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



    public function destroyUser(Request $request)
    {
        $delete_id = $request->delete_id;
    
        // Find the record to delete
        $delete = StudentModel::find($delete_id);
    
        if ($delete) {
            // Delete the record
            $delete->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Record not found.']);
        }
    }
     
}

