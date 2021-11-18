<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','rol.admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("Hola mundo");
        $user = User::orderBy('created_at','desc')->paginate(3);
        return view('dashboard.user.index',['users' => $user]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles =  Rol::all();
        // dd($roles->all());
        return view("dashboard.user.create", ['user' => new User(), 'roles' => $roles]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        // dd($request);
        User::create([
            'name' => $request['name'],
            'rol_id' => 1, // admin
            'surname' => $request['surname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return back()->with('status','Usuario creado con exito');


        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view("dashboard.user.show",["user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $roles =  Rol::all();
        return view("dashboard.user.edit",["user" => $user, 'roles' => $roles]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        //
        // dump($request->route('user'));
        // dump($user);
        // dd($request->all());
        
        $user->update([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email' => $request['email'],
        ]);

        return back()->with('status','User actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // 
        $user->delete();
        return back()->with('status','Usuario eliminado con exito');
    }
}
