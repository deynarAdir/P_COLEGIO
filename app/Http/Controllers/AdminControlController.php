<?php

namespace App\Http\Controllers;

use App\AdminControl;
use App\User;
use App\Rol;
use Carbon\Carbon;
use App\Schedules;
use DateTime;
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
            $date = date('Y-M-d');
            $dateStore = date('Y-m-d');
            $time = date('H:i');
            $ci = $request->ci;
            $sw = 0;
            $hour_en = '';
            $user = User::join('rols','users.id_rol','=','rols.idrol')->select('users.iduser','users.name','rols.description1')
            ->where('users.ci','=',$ci)->where('rols.description2','=','Administracion')->first();
            if(!is_null($user)){
                $assis = AdminControl::where('id_user','=',$user->iduser)->where('date','=',$dateStore)->first();
                if(is_null($assis)){
                    setlocale(LC_ALL, 'es_ES');
                    $dat = Carbon::parse($date);
                    $day = $dat->formatLocalized('%A');
                    $schedule = User::join('horarios','users.iduser','=','horarios.id_user')->join('days','horarios.id_day','=','days.idday')
                            ->select('users.name','horarios.hour_entry','days.description')
                            ->where('users.ci','=',$ci)->get();
                    foreach ($schedule as $sche) {
                        if (strtolower($day)==strtolower($sche->description)){
                            $sw = 1;
                            $hour_en = $sche->hour_entry;
                        }
                    }
                    if($sw === 1){
                        $assistance = new AdminControl;
                        $assistance->id_user = $user->iduser;
                        $assistance->date = $dateStore;
                        $assistance->start_time = $time;
                        $assistance->end_time = '00:00';
                        if( $hour_en > $time ) {
                            $ret = '00:00';
                            $msg = $user->name . ' marco su ingreso satisfactoriamente ';
                        } else {
                            $entry = new DateTime($hour_en);
                            $arriv = new DateTime($time);
                            $retraso = $entry->diff($arriv);
                            $ret = $retraso->format('%H:%i');
                            $msg = $user->name . ' se retraso ' . $ret . ' minutos a su hora de ingreso';
                        }
                        $assistance->delay = $ret;
                        $assistance->save();
                    }else{
                        $msg = 'Usted no tiene horarios asignados el dia de hoy';
                    }
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
            $sw = 0;
            $user = User::join('rols','users.id_rol','=','rols.idrol')->select('users.iduser','users.name','rols.description1')
            ->where('users.ci','=',$ci)->where('rols.description2','=','Administracion')->first();

            if(!is_null($user)){
                setlocale(LC_ALL, 'es_ES');
                $dat = Carbon::parse($date);
                $day = $dat->formatLocalized('%A');
                $schedule = User::join('horarios','users.iduser','=','horarios.id_user')->join('days','horarios.id_day','=','days.idday')
                        ->select('users.name','horarios.hour_entry','days.description')
                        ->where('users.ci','=',$ci)->get();
                foreach ($schedule as $sche) {
                    if (strtolower($day)==strtolower($sche->description)){
                        $sw = 1;
                        $hour_en = $sche->hour_entry;
                    }
                }
                if($sw == 1){
                    $assis = AdminControl::where('id_user','=',$user->iduser)->where('date','=',$date)->first();
                    if(!is_null($assis)){
                        if($assis->end_time == '00:00:00'){
                            $assis->end_time = $time;
                            $assis->extra = $request->extra;
                            $assis->save();
                            $msg = $user->name . ' marco su salida satisfactoriamente';
                        }else{
                            $msg = $user->name . ' Ya marco su salida el dia de hoy';
                        }
                    }else{
                        $msg = $user->name . ' No marco la entrada el dia de hoy';
                    }

                }else{
                    $msg = 'Usted no tiene horarios asignados el dia de hoy';
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
