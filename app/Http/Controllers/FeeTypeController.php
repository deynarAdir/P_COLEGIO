<?php

namespace App\Http\Controllers;

use App\FeeType;
use Illuminate\Http\Request;

class FeeTypeController extends Controller
{
<<<<<<< HEAD
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fee = FeeType::orderBy('idfee_types','desc')->paginate(5);
        return view('feetype.index',['fee'=> $fee]);
=======
    public function index()
    {
        $fee = FeeType::orderBy('idfee_type','desc')->paginate(10);
        return view('feetypes.index',['fee'=> $fee]);
>>>>>>> 94da7ebfa6bb3b9c05f24076503c011fa9e70944
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        return view('feetype.create');
=======
        return view('feetypes.create');
>>>>>>> 94da7ebfa6bb3b9c05f24076503c011fa9e70944
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
<<<<<<< HEAD
        $fee->price= $request->price;
        $fee->discount=$request->discount;
        $fee->save();
        return redirect()->route('feetype.index');
=======
        $fee->price= 400.00;
        $fee->discount=$request->discount;
        $fee->save();
        return redirect()->route('cuotas.index');
>>>>>>> 94da7ebfa6bb3b9c05f24076503c011fa9e70944
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
<<<<<<< HEAD
        return view('feetype.edit',['fee'=> $fee]);
=======
        return view('feetypes.edit',['fee'=> $fee]);
>>>>>>> 94da7ebfa6bb3b9c05f24076503c011fa9e70944
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
<<<<<<< HEAD
        $fee->price= $request->price;
        $fee->discount=$request->discount;
        $fee->save();
        return redirect()->route('feetype.index');
    }

=======
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
>>>>>>> 94da7ebfa6bb3b9c05f24076503c011fa9e70944
}
