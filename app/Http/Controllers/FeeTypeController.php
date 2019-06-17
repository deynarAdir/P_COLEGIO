<?php

namespace App\Http\Controllers;

use App\FeeType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFeeType;

class FeeTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fee = FeeType::orderBy('idfee_type','desc')->paginate(5);
        return view('feetypes.index',['fee'=> $fee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feetypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeeType $request)
    {
        $fee = new FeeType;
        $fee->description=$request->description;
        $fee->price= 400.00;
        $fee->discount=$request->discount;
        $fee->save();
        return redirect()->route('cuotas.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fee = FeeType::findOrFail($id);
        return view('feetypes.edit',['fee'=> $fee]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFeeType $request, $id)
    {
        $fee = FeeType::findOrFail($id);
        $fee->description=$request->description;
        $fee->discount=$request->discount;
        $fee->discount=$request->discount;
        $fee->save();
        return redirect()->route('cuotas.index');
    }


    public function active($id)
    {
        $fee = FeeType::findOrFail($id);
        $fee->state = true;
        $fee->save();
        return redirect()->route('cuotas.index');
    }

    public function desactive($id)
    {
        $fee = FeeType::findOrFail($id);
        $fee->state = false;
        $fee->save();
        return redirect()->route('coutas.index');
    }
}
