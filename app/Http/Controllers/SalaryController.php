<?php

namespace App\Http\Controllers;

use App\Salary;
use App\User;
use App\AdminControl;
use App\Schedules;
use App\Contract;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salaries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::join('rols','users.id_rol','=','rols.idrol')->select('users.iduser','users.name','users.ci','rols.description1')
            ->where('rols.description2','=','Administracion')->get();
        return view('salaries.create',compact('user'));
    }

    public function getPersonal($ci){
        $user = User::where('ci',$ci)->first();
        return ['user' => $user];
    }

    public function getDiscount($ci){
        $user = User::where('ci',$ci)->first();
        $assistance = AdminControl::where('status','=',0)->get();
        $timeT = date('00:00:00');
        $a = new \DateTime($timeT);
        foreach ($assistance as $assis) {
            $b = new \DateInterval((new DateTime($assis->delay))->format('\P\TH\Hi\Ms\S')); //Creo un objeto DateInterval
            $a->add($b); //Sumo las horas
            $total = $a->format('H:i:s'); //Retorno la suma
        }
        $des = date('00:20:00');
        if($total > $des){
            $discount = 80;
        }else{
            $discount = 0;
        }
        return ['discount' => $discount];
    }

    public function getBonus($ci){
        $user = User::where('ci',$ci)->first();
        $assistance = AdminControl::where('extra','=',1)->get();
        $total = count($assistance);
        $bonus = 0;
        if($total > 0){
            for ($i=0; $i < count($assistance); $i++) {
                $bonus = $bonus+80;
            }
        }
        return ['bonus' => $bonus];
    }
    public function getSalary($ci){
        $salary = User::join('contracts','users.iduser','=','contracts.id_user')
                ->select('contracts.payment')
                ->where('ci',$ci)->first();
        return ['salary' => $salary];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        //
    }
}
