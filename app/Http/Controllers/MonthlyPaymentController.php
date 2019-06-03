<?php

namespace App\Http\Controllers;

use App\MonthlyPayment;
use Illuminate\Http\Request;

class MonthlyPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monthly = MonthlyPayment::orderBy('idmonthly_payment','desc')->paginate(10);
        return view('monthlypayments.index',['monthly'=> $monthly]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monthlypayments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $monthly = new MonthlyPayment;
        $monthly->start_date=$request->start_date;
        $monthly->end_date= $request->end_date;
        $monthly->description=$request->description;
        $monthly->price=$request->price;
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
        $monthly->price = $request->price;
        $monthly->save();
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
}
