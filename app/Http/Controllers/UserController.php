<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests\StoreNewUser;
use App\Http\Requests\EditUserRequest;
use DB;
use Session;
use Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        return view('manage.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
      return view('manage.users.create')->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewUser $request)
    {
        # check if password is manualy added
        if(!empty($request->password)){
            $password = trim($request->password);
        }else{
          # generate password
            $lenght = 10;
            $keyspace = '123456789zxcvbnmasdfghjklqwertyuiopZXCVBNMASDFGHJKLQWERTYUIOP';
            $str = '';
            $max = mb_strlen($keyspace,'8bit') - 1;
            for($i=0; $i<$lenght; $i++){
                  $str .= $keyspace[random_int(0, $max)]; 
            }

            $password = Hash::make($str);
        }

        $user = User::create(
            array_merge($request->input(), ['password' => $password])
        );

         if ($request->roles) {
        $user->syncRoles(explode(',', $request->roles));
      }

        return redirect()->route('users.show', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id',$id)->with('roles')->first();
        return view('manage.users.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->with('roles')->first();
        $roles = Role::all();
        return view('manage.users.edit')->with('user',$user)->with('roles',$roles);
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
         $this->validateWith([
        'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id
            ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password_options == 'auto'){
               # generate password
            $lenght = 10;
            $keyspace = '123456789zxcvbnmasdfghjklqwertyuiopZXCVBNMASDFGHJKLQWERTYUIOP';
            $str = '';
            $max = mb_strlen($keyspace,'8bit') - 1;
            for($i=0; $i<$lenght; $i++){
                  $str .= $keyspace[random_int(0, $max)]; 
            }

            $user->password = Hash::make($str); 

        }elseif($request->password_options == 'manual'){
            $user->password = Hash::make(trim($request->password));
        }

        $user->save();

        $user->syncRoles(explode(',', $request->roles));
        Session::flash('success','User updated');
        return redirect()->route('users.show',$id);


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
