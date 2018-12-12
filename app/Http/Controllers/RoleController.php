<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditRoleRequest;
use App\Http\Requests\StoreNewRoleRequest;
use App\Role;
use App\Permission;
use Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('manage.roles.index')->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('manage.roles.create')->with('permissions',$permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewRoleRequest $request)
    {
          $role = new Role();
          $role->display_name = $request->display_name;
          $role->name = $request->name;
          $role->description = $request->description;
          $role->save();

          if ($request->permissions) {
             $role->syncPermissions(explode(',', $request->permissions));
          }

      Session::flash('success', 'Successfully created the new '. $role->display_name . ' role in the database.');
      return redirect()->route('roles.show', $role->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::where('id',$id)->with('permissions')->first();
        return view('manage.roles.show')->with('role',$role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('id',$id)->with('permissions')->first();
        $permissions = Permission::all();
        return view('manage.roles.edit')->with('role',$role)->with('permissions',$permissions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        
        if($request->permissions){
          $role->syncPermissions(explode(',', $request->permissions));
        }

        Session::flash('success','Successfully update the '.$role->display_name.' role');
        return redirect()->route('roles.show',$id);
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
