<?php

namespace App\Http\Controllers;

use App\Secretary;
use App\TypeContract;
use App\Contract;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SecretaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user = User::join('secretaries','users.iduser','=','secretaries.id_user')
            ->select('users.iduser','users.name', 'users.paternal','users.maternal', 'users.ci', 'users.cellphone',
                'secretaries.idsecretary', 'secretaries.name_title')
            ->where('id_rol','=',6)->where('estate','=',1)->orderBy('iduser','desc')->get();
        return view('secretaries.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeContract = typeContract::all();
        return view('secretaries.create', compact('typeContract'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->id_rol = 6;
        $user->name = $request->name;
        $user->paternal = $request->paternal;
        $user->maternal = $request->maternal;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->email = $request->email;
        //falta encriptar
        $user->password = bcrypt($request->password);
        $user->ci = $request->ci;
        $user->cellphone = $request->cellphone;
        $user->phone = $request->phone;
        $user->save();

        $secretary = new Secretary();
        $secretary->id_user = $user->iduser;
        $secretary->num_job_certificate = $request->numberCer;
        $secretary->name_title = $request->title;
        if(Input::hasFile('cv')){
            $file = Input::file('cv');
            $file->move(public_path().'\documents\secretaries',$file->getClientOriginalName());
            $secretary->cv=$file->getClientOriginalName();
        }
        $secretary->save();

        $contract = new Contract();
        $contract->id_user = $user->iduser;
        $contract->id_type_contract = $request->typeContract;
        $contract->start_date = $request->dateStart;
        $contract->end_date = $request->dateEnd;
        $contract->payment = $request->payment;
        $contract->save();

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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $secretary = Secretary::where('id_user','=',$id)->first();
        return view('secretaries.edit',compact('user','secretary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Secretary  $secretary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->paternal = $request->paternal;
        $user->maternal = $request->maternal;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->ci = $request->ci;
        $user->cellphone = $request->cellphone;
        $user->phone = $request->phone;
        $user->update();

        $secretary = Secretary::where('id_user','=',$id)->first();
        $secretary->num_job_certificate = $request->numberCer;
        $secretary->name_title = $request->title;
        $secretary->save();

        return redirect()->route('secretary.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Secretary  $secretary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Secretary $secretary)
    {
        //
    }
}
