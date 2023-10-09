<?php

namespace App\Http\Controllers;

use App\Models\RolesModel;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    
    public function store(Request $request)
    {

        $add  = new RolesModel();
        $add->name = $request->get('name');
        $add->save();
        return view('roleDisplay');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showrole()
    {
        $show = RolesModel::all();
        return view('roleDisplay' , ['show'=>$show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
