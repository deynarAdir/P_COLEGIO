<?php

namespace App\Http\Controllers;

use App\FeeType;
use Illuminate\Http\Request;

class FeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fee = FeeType::orderBy('idfee_types','desc')->paginate(5);
        return view('feetype.index',['fee'=> $fee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feetype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fee = new FeeType;
        $fee->description=$request->description;
        $fee->price= $request->price;
        $fee->discount=$request->discount;
        $fee->save();
        return redirect()->route('feetype.index');
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
        return view('feetype.edit',['fee'=> $fee]);
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
        $fee = FeeType::findOrFail($id);
        $fee->description=$request->description;
        $fee->price= $request->price;
        $fee->discount=$request->discount;
        $fee->save();
        return redirect()->route('feetype.index');
    }

}
