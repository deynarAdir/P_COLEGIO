<?php

namespace App\Http\Controllers;

use App\MonthlyPayment;
use App\StudentPayment;
use App\User;
use Illuminate\Http\Request;

class StudentPaymentController extends Controller
{
    public function index()
    {
        $studentpayments = StudentPayment::orderBy('idstudent_payment','desc')->paginate(10);
        return view('studentpayments.index',['studentpayments'=> $studentpayments]);
    }

    public function create()
    {
    	$students = User::where('id_rol',4)->get();
    	// $students = User::where('id_rol',4)->pluck('ci', 'iduser');
        return view('studentpayments.create',[
        	'students' => $students
        ]);
    }

    public function getMonthly(){
    	$monthly = MonthlyPayment::where('state',1)->orderBy('idmonthly_payment','desc')->paginate(10);
    	return ['monthly' => $monthly];
    }

    public function getStudent($ci){
    	$student = User::where('ci',$ci)->first();
    	return ['student' => $student];
    }

    public function store(Request $request)
    {
        $monthly = new MonthlyPayment;
        $monthly->start_date=$request->start_date;
        $monthly->end_date= $request->end_date;
        $monthly->description=$request->description;
        $monthly->save();
        return redirect()->route('mensualidad.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $monthly = MonthlyPayment::findOrFail($id);
        return view('monthlypayments.edit',['monthly'=> $monthly]);
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
        $monthly = MonthlyPayment::findOrFail($id);
        $monthly->start_date = $request->start_date;
        $monthly->end_date =  $request->end_date;
        $monthly->description = $request->description;
        $monthly-> save();
        return redirect()->route('mensualidad.index');
    }

    public function active($id)
    {
        $monthly = MonthlyPayment::findOrFail($id);
        $monthly->state = true;
        $monthly->save();
        return redirect()->route('mensualidad.index');
    }

    public function desactive($id)
    {
        $monthly = MonthlyPayment::findOrFail($id);
        $monthly->state = false;
        $monthly->save();
        return redirect()->route('mensualidad.index');
    }

    public function search(Request $request){
        $palabra = $request->buscar;
        if($palabra == ''){
            $monthlypayments = MonthlyPayment::select('idmonthly_payment','start_date','end_date','description')->where('state','=',1)  
                        ->orderBy('idmonthly_payment','desc')->paginate(5);
        }else{
            $monthlypayments = MonthlyPayment::select('idmonthly_payment','start_date','end_date','description')
                    ->where('idmonthly_payment', 'like', '%'.$palabra.'%')->orWhere('start_date','like','%'.$palabra.'%')->orWhere('end_date','like','%'.$palabra.'%')->orWhere('description','like','%'.$palabra.'%')->andWhere('state','=',1)->paginate(8);
        }
        return [
            'monthlypayments' => $monthlypayments
        ];
    }
}
