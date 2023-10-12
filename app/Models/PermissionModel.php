<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Contracts\Permission;


class PermissionModel extends Model
{
    use HasFactory;

    protected $table = "permissions";

    protected $fillable = ['name', 'guard_name'];

    public function fetchPermission()
    {
        return PermissionModel::all();
    }
}
