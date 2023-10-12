<?php

namespace App\Http\Controllers;

use App\Models\PermissionModel;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public $permission_model;
    public function __construct()
    {
        $this->permission_model = new PermissionModel();
    }

    public function storePermission(Request $request, PermissionModel $pm)
    {

        $store = new PermissionModel;

        $store->name = $request->get('name');
        $store->guard_name = $request->get('guard_name');
        $store->save();

        session()->flash('success', 'Permission added successfully.');

        return redirect('showPermission');
    }


    // fetch all permissions 
    public function fetchPermission(Request $request)
    {
        $permission_data = $this->permission_model->fetchPermission();
        $role_data =Role::findById($request->role_id);
        $rolepermission = $role_data->permissions->pluck('id')->toArray();
        // dd($rolepermission);
        $html = view('admin.RolesAndPermission.partialFiles.partial', ['permission_data' => $permission_data , 'rolepermission'=>$rolepermission])->render();

        $response['html'] = $html;
        $response['status'] = true;
        return response(json_encode($response), 200);
    }

    public function showPermission()
    {
        $sp = $this->permission_model->fetchPermission();
        return view('showPermission', ['sp' => $sp]);
    }

    public function editPermission($id, PermissionModel $pm)
    {
        $edit = PermissionModel::find(decrypt($id));
        return view('updatePermission', ['edit' => $edit]);
    }


    public function updatePermission(Request $request, $id, PermissionModel $pm)
    {

        $up = PermissionModel::find(decrypt($id));

        $up->name = $request->get('name');
        $up->save();
        session()->flash('success', 'Permission updated successfully.');

        return redirect('showPermission');
    }


    public function destroyPermission($id, PermissionModel $pm)
    {

        $delete = PermissionModel::find(decrypt($id));
        $delete->delete();
        session()->flash('success', 'Permission deleted successfully.');

        return redirect('showPermission');
    }
}
