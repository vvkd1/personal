<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'detail' => 'required',

        ]);
        
        $add = new ProductModel();
        $add->name = $request->get('name');
        $add->detail = $request->get('detail');
        $add->save();

        return redirect('product-display')->with('message', 'Product added successfully');
       
        
    }

  
    public function showproduct(Request $request)
    {
        if ($request->ajax()) {
            $data = ProductModel::latest()->get();
    
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('update-Product', ['id' => $row->id]) . '" class="editBtn"><i class="fa-solid fa-pen-to-square" style="color: #4a7ed9;"></i></a>';
                    $deleteBtn = '<a href="' . route('delete-Product', ['id' => $row->id]) . '" class="delete-users" id="openEditForm"><i class="fa-solid fa-trash" style="color: #cc2424;"></i></a>';
                    
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('product-display');
    }
    
    public function edit($id)
    {
      
        $data = ProductModel::findOrFail($id);             
        return view('update-Product', compact('data'));
    
    }

   
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'detail' => 'required',
        ]);
        
        $product = ProductModel::find($id);
        if ($product) {
            $product->name = $request->get('name');
            $product->detail = $request->get('detail');
            $product->save();
            
            return redirect('product-display')->with('message', 'Product updated successfully');
        }

       
    }
    
    public function destroyProduct($id)
    {
        $product = ProductModel::find($id);
        
        if ($product) {
            $product->delete();
            return redirect('product-display')->with('message', 'Product deleted successfully');
        }
       
    }
    

}
