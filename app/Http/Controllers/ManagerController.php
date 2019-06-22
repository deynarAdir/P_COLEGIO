<?php

namespace App\Http\Controllers;

use App\Manager;
use App\User;
use App\Rol;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = new Rol;
        $user =new User;
        $user->id_rol ='5';
        $user->name=$request->name;
        $user->paternal=$request->paternal;
        $user->paternal=$request->maternal;
        $user->gender=$request->gender;
        $user->address=$request->address;
        $user->email=$request->email;
        $user->ci=$request->ci;
        $user->cellphone=$request->cellphone;
        $user->password=bcrypt($request->ci);
        $user->save();
        $user= User::all()->last();

        $manager = new Manager;
        $manager->id_user=$user->iduser;
        $manager->save();
        return redirect()->route('inscriptions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        //
    }
}
