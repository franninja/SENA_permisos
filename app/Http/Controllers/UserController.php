<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:user.index')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->paginate();

        return view('users.index',[
            'users' => $users
        ]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

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
        
        return view('users.edit', [
            'user' => $user
        ]);
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
        $user = User::find($id);

        $validate = $this->validate($request,[
            'name' => ['required', 'string', 'max:180'],
            'email' => ['required', 'string', 'string:180']
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        
        if($request->input('password')){
            $validate = $this->validate($request, [
                'password' => ['string', 'confirmed']
            ]);

            $password = Hash::make($request->input('password'));

            $user->password = $password;
        }

        $user->name = $name;
        $user->email = $email;

        $user->update();

        return redirect()->route('user.edit', $id)->with('message', 'usuario actualizado');


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


    // para los roles - ruta protegida
    public function role(Request $request, $id){
        $user = User::find($id);
        $roles = Role::all();

        return view('users.role',[
            'user' => $user,
            'roles' => $roles
        ]);
    }

    // para roles - ruta protegida
    public function saveRole(Request $request){

        $id = $request->input('user');
        $roles = $request->roles;

        $user = User::find($id);

        $user->roles()->sync($roles);

        return redirect()->route('user.role', ['user' => $user])->with('message', 'roles asignados');
    }
}
