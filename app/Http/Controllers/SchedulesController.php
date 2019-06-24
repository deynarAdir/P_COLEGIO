<?php

namespace App\Http\Controllers;

use App\Schedules;
use App\User;
use App\Day;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::join('rols','users.id_rol','=','rols.idrol')
        ->select('users.iduser','users.name','users.paternal','users.maternal','users.ci','users.address',
            'rols.idrol','rols.description1')
        ->where('rols.description2','=','Administracion')->where('estate','=',1)->orderBy('iduser','desc')->get();
        return view('schedules.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::join('rols','users.id_rol','=','rols.idrol')
        ->select('users.iduser','users.name','users.paternal','users.maternal','users.ci','rols.description1')
        ->where('users.iduser','=',$id)->first();
        $days = Day::all();
        return view('schedules.create',compact('user','days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $iduser = $request->iduser;
        $id_day = $request->tidday;
        $hour_entry = $request->tstart_hour;
        $hour_exit = $request->tend_hour;
        $cont=0;
        while ($cont < count($id_day)) {
            $schedule = new Schedules;
            $schedule->id_user = $iduser;
            $schedule->id_day = $id_day[$cont];
            $schedule->hour_entry = $hour_entry[$cont];
            $schedule->hour_exit = $hour_exit[$cont];
            $schedule->save();
            $cont=$cont+1;
        }

        return redirect()->route('schedulesPersonal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dates = Schedules::join('users','users.iduser','=','horarios.id_user')->join('rols','rols.idrol','=','users.id_rol')->join('days','days.idday','=','horarios.id_day')->select('users.name','users.paternal','users.maternal','rols.description1','days.description','horarios.hour_entry','horarios.hour_exit')
            ->where('horarios.id_user','=',$id)->get();

        return view('schedules.show',compact('dates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedules $schedules)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedules $schedules)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedules  $schedules
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedules $schedules)
    {
        //
    }
}
