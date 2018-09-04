<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'ASC')->paginate(10);
        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | unique:roles,name',
            'display_name' => 'required',
            'description' => 'required'
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');

        if($role->save())
        {
            event(new \App\Events\CreateRole($role));
        }

        Session::flash('success', 'Role successfully created');

        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();

        $rolePermissions = Permission::join(
            "permission_role",
            "permission_role.permission_id","=","permissions.id"
        )->where("permission_role.role_id", $id)->get();

        return view('roles.show')
            ->with('role', $role)
            ->with('rolePermissions', $rolePermissions)
            ->with('permissions', $permissions);

    }


    /**
     * Add Permission to role.
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function attachPermission(Request $request)
    {
        $this->validate($request, [
            'permission' => 'required',
        ]);

        //      $role = $request->input('role');
        //      $role->perms()->sync(array($permission->id));

        $role = Role::where('name', '=', $request->input('role'))->get()->first();
        $permission = Permission::where('name', '=', $request->input('permission'))->get()->first();
        $role_id = $request->input('role_id');

        $record = DB::select("SELECT * FROM permission_role WHERE permission_id = $permission->id AND role_id = $role->id");

        if (count($record)) {
            Session::flash('info', 'Permission already attached to role');
            return redirect()->route('roles.show', $role_id);
        } else {
            if($role->attachPermission($permission))
            {
                event(new App\Events\AddPermissionToRole($permission,$role));
            }
            Session::flash('success', 'Permission attached to role successfully');
            return redirect()->route('roles.show', $role_id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles.edit')->with('role', $role);
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
        $this->validate($request, [
            'name' => 'required | unique:roles,name,'.$id,
            'display_name' => 'required',
            'description' => 'required'
        ]);

        $input = $request->all();
        $name = $role->name;
        $role = Role::find($id);

        if($role->update($input))
        {
            event(new \App\Events\UpdateRole($name));
        }

        Session::flash('success', 'Role successfully updated');

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $name = $role->name;
        if($role->delete())
        {
            event(new \App\Events\DeleteRole($name));
        }

        Session::flash('success','Role successfully deleted');

        return redirect()->route('roles.index');
    }
}
