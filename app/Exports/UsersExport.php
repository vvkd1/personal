<?php

namespace App\Exports;

use App\Models\StudentModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StudentModel::all();
        
        // return DB::table('student')
        // ->select('id', 'name', 'email','password')
        // ->where('name', 'demo1')
        // ->get();
    }
}
