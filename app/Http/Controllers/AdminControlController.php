<?php

namespace App\Http\Controllers;

use App\AdminControl;
use App\User;
use App\Rol;
use Illuminate\Http\Request;

class AdminControlController extends Controller
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
        return view('assistancePersonal.createIn');
    }



    public function store(Request $request)
    {
        if($request->ajax()) {
            $date = date('Y-m-d');
            $time = date('H:i');
            $ci = $request->ci;
            $user = User::join('rols','users.id_rol','=','rols.idrol')->select('users.iduser','users.name','rols.description1')
            ->where('users.ci','=',$ci)->where('rols.description2','=','Administracion')->first();
            if(!is_null($user)){
                $assis = AdminControl::where('id_user','=',$user->iduser)->where('date','=',$date)->first();
                if(is_null($assis)){
                    $assistance = new AdminControl;
                    $assistance->id_user = $user->iduser;
                    $assistance->date = $date;
                    $assistance->start_time = $time;
                    $assistance->end_time = '00:00';
                    $assistance->save();
                    $msg = $user->name . ' marco su ingreso satisfactoriamente';
                }else{
                    $msg = $user->name . ' ya marco su asistencia el dia de hoy';
                }
            }else{
                $msg = 'Usted no es un administrador';
            }

            return response()->json([
                'message' => $msg,
            ]);
        }
    }

    public function createEx()
    {
        return view('assistancePersonal.createExit');
    }

    public function storeExit(Request $request)
    {
        if($request->ajax()) {
            $date = date('Y-m-d');
            $time = date('H:i');
            $ci = $request->ci;
            $user = User::join('rols','users.id_rol','=','rols.idrol')->select('users.iduser','users.name','rols.description1')
            ->where('users.ci','=',$ci)->where('rols.description2','=','Administracion')->first();

            if(!is_null($user)){
                $assis = AdminControl::where('id_user','=',$user->iduser)->where('date','=',$date)->first();
                if(!is_null($assis)){
                    if($assis->end_time == '00:00'){
                        $assis->end_time = $time;
                        $assis->save();
                        $msg = $user->name . ' marco su salida satisfactoriamente';
                    }else{
                        $msg = $user->name . ' Ya marco su salida el dia de hoy';
                    }
                }else{
                    $msg = $user->name . ' No marco la entrada el dia de hoy';
                }
            }else{
                $msg = 'Usted no es un administrador';
            }

            return response()->json([
                'message' => $msg,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminControl  $adminControl
     * @return \Illuminate\Http\Response
     */
    public function show(AdminControl $adminControl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminControl  $adminControl
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminControl $adminControl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminControl  $adminControl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminControl $adminControl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminControl  $adminControl
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminControl $adminControl)
    {
        //
    }
}
