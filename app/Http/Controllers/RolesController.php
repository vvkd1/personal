<?php

namespace App\Http\Controllers;

use App\Models\RolesModel;
use Illuminate\Http\Request;
use League\CommonMark\Node\Block\Document;

class RolesController extends Controller
{


    public function storeRole(Request $request, RolesModel $rm)
    {


        $addRole = new RolesModel;
        $addRole->name = $request->get('name');
        $addRole->guard_name = $request->get('guard_name');
        $addRole->save();
        session()->flash('success', 'Role added successfully.');

        return redirect('showRoles');
    }

    public function showRole(RolesModel $rm)
    {  
        $Ad = RolesModel::all();
        return view('showRoles', compact('Ad'));
    }



    public function editRole($id, RolesModel $rm)
    {

        $edit = RolesModel::find(decrypt($id));
        return view('updateRoles', ['edit' => $edit]);
    }


    public function updateRole(Request $request, $id, RolesModel $rm)
    {

        $update = RolesModel::find(decrypt($id));
        $update->name = $request->get('name');
        $update->save();
        session()->flash('success', 'Role Update successfully.');
        return redirect('showRoles');
    }


    public function destroyRole($id, RolesModel $rm)
    {

        $delete = RolesModel::find($id);
        $delete->delete();
        session()->flash('success', 'Role delete successfully.');
        return redirect('showRoles');
    }
}
