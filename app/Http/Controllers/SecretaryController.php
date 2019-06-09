<?php

namespace App\Http\Controllers;

use App\User;
use App\Secretary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SecretaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::search($request->searchName)->where('id_rol','=',3)->where('estate','=',1)->get();
        return view('secretaries.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secretaries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->id_rol = 3;
        $user->name = $request->name;
        $user->paternal = $request->paternal;
        $user->maternal = $request->maternal;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->ci = $request->ci;
        $user->cellphone = $request->cellphone;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->save();

        $secretary = new Secretary;
        $secretary->id_user = $user->iduser;
        $secretary->num_job_certificate = $request->numberCer;
        $secretary->num_languade_diploma = $request->numberDip;
        if(Input::hasFile('cv')){
            $file = Input::file('cv');
            $file->move(public_path().'\documents\personal',$file->getClientOriginalName());
            $secretary->cv=$file->getClientOriginalName();
        }
        $secretary->save();

        return redirect()->route('secretary.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Secretary  $secretary
     * @return \Illuminate\Http\Response
     */
    public function show(Secretary $secretary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Secretary  $secretary
     * @return \Illuminate\Http\Response
     */
    public function edit($secretary)
    {
        $user = User::findOrFail($secretary);
        $secretary = Secretary::where('id_user','=',$user->iduser)->first();
        return view('secretaries.edit',compact('user','secretary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Secretary  $secretary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $secretary)
    {
        $user = User::findOrFail($secretary);
        $user->name = $request->name;
        $user->paternal = $request->paternal;
        $user->maternal = $request->maternal;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->cellphone = $request->cellphone;
        $user->phone = $request->phone;
        $user->update();

        $secretary = Secretary::where('id_user','=',$user->iduser)->first();
        $secretary->num_job_certificate = $request->numberCer;
        $secretary->num_languade_diploma = $request->numberDip;
        $secretary->update();

        return redirect()->route('secretary.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Secretary  $secretary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::FindOrFail($id);
        $user->estate = 0;
        $user->update();
        return redirect()->route('secretary.index');
    }
}
