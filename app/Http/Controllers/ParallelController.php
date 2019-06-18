<?php

namespace App\Http\Controllers;

use App\Parallel;
use Illuminate\Http\Request;

class ParallelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parallels = Parallel::orderBy('idparallel','desc')->paginate(7);
        return view('parallels.index',[
            'parallels' => $parallels
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parallels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parallel =new Parallel;
        $parallel->name= $request->name;
        $parallel->quantity = $request->quantity;
        $parallel->save();
        return redirect()->route('parallels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parallel  $parallel
     * @return \Illuminate\Http\Response
     */
    public function show(Parallel $parallel)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parallel  $parallel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parallel = Parallel::findOrFail($id);
        return view('parallels.edit',['degree' => $parallel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parallel  $parallel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parallel =Parallel::findOrFail($id);
        $parallel->name= $request->name;
        $parallel->quantity = $request->quantity;
        $parallel->save();
        return redirect()->route('parallel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parallel  $parallel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parallel $parallel)
    {
        //
    }
}
