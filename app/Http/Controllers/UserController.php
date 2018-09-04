<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Hash;
use DB;
use Illuminate\Support\Facades\Session;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(20);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name', 'id')->all();
        return view('users.create')->with('roles', $roles);
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
            'name' => 'required',
            'email' => 'required | email | unique:users,email',
            'password' => 'required | same:confirm-password',
            'role' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        if(Auth::user())
        {
            event(new \App\Events\CreateUserProfile(Auth::user()));
        }

        $user->attachRole($request->input('role'));

        if(Auth::check()){
            Session::flash('success', 'User created successfully');
            return back();
        }

        return redirect('dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('display_name', 'id');
        $userRole = $user->roles->pluck('id', 'id')->toArray();

        return view('users.edit')
            ->with('user', $user)
            ->with('roles', $roles)
            ->with('userRole', $userRole);
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
            'roles' => 'required'
        ]);

        $input = $request->all();

        $user = User::find($id);

        DB::table('role_user')->where('user_id', $id)->delete();

        foreach ($request->input('roles') as $key => $value) {
            if($user->attachRole($value))
            {
                \App\ActivityLog::create([
                    'user_id'   => Auth::id(),
                    'summary'   => "added the ".$value." role to the user account ".$user->name,
                    'action'    => 'add'
                ]);
            }
        }

        Session::flash('success', 'User successfully updated');

        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $name = $user->name;

        if($user->delete())
        {
            \App\ActivityLog::create([
                'user_id'   => Auth::id(),
                'summary'   => "deleted the user account ".$name,
                'action'    => 'delete'
            ]); 
        }
        

        Session::flash('success','User deleted successfully');

        return redirect()->route('users.index');
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $users = User::search($query)->get();
        if($request->ajax())
        {
            return $users;
        }
        return view('users.index',[
            'users' => $users,
            'title' => "Search results for '$query'"
        ]);
    }
}
