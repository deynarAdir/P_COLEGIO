<?php

namespace App\Http\Controllers;

use App\Assets;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = Assets::orderBy('idasset','desc')->paginate(10);
        return view('assets.index',['assets'=> $assets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assets = new Assets;
        $assets->name = $request->input('name');
        $assets->brand = $request->input('brand');

        if ($request->Hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/imagenequipo/',$filename);
            $assets->image = $filename;
        }else {
            return $request;
            $assets->image = '';
        }

        $assets->description = $request->input('description');
        $assets -> save();
        return redirect()->route('equipamiento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function show(Assets $assets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assets = Assets::find($id);
        return view('assets.edit',['assets' => $assets]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assets $assets)
    {
        $assets = Assets::find($id);


        $assets->name = $request->input('name');
        $assets->brand = $request->input('brand');

        if ($request->Hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/imagenequipo/',$filename);
            $assets->image = $filename;
        }else {
            return $request;
            $assets->image = '';
        }

        $assets->description = $request->input('description');
        
        $assets -> save();
        return redirect()->route('equipamiento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assets $assets)
    {
        //
    }
}
