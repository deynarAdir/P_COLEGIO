<?php

namespace App\Http\Controllers;

use App\ClassRoom;
use App\TypeClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = ClassRoom::join('type_classrooms','classrooms.id_type_classroom','type_classrooms.idtype_classroom')
        ->orderBy('idclassroom','desc')->paginate(10);
        return view('classrooms.index',['class'=> $class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypeClassRoom::all();
        return view('classrooms.create',[
            'types' => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class = new ClassRoom;
        $class->id_type_classroom=$request->id_type_classroom;
        $class->classroom_description= $request->classroom_description;
        $class->classroom_floor=$request->classroom_floor;
        $class->capacity=$request->capacity;
        $class->classroom_characteristic=$request->classroom_characteristic;
        $class->state=1;
        $class->save();
        return redirect()->route('aulas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = ClassRoom::findOrFail($id);
        $types = TypeClassRoom::all();
        return view('classrooms.edit',[
            'class'=> $class,
            'types' => $types
        ]);
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
        $class = ClassRoom::findOrFail($id);
        $class->id_type_classroom=$request->id_type_classroom;
        $class->classroom_description= $request->classroom_description;
        $class->classroom_floor=$request->classroom_floor;
        $class->capacity=$request->capacity;
        $class->classroom_characteristic=$request->classroom_characteristic;
        $class->state=1;
        $class->save();
        return redirect()->route('aulas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $class = ClassRoom::findOrFail($id);
        $class->state = true;
        $class->save();
        return redirect()->route('aulas.index');
    }

    public function desactive($id)
    {
        $class = ClassRoom::findOrFail($id);
        $class->state = false;
        $class->save();
        return redirect()->route('aulas.index');
    }
}
