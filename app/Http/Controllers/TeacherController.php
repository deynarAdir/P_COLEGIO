<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id_rol','=',2)->get();
        $teacher = Teacher::all();
        return view('teachers.index',[
            'user' => $user,
            'teacher' => $teacher
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->id_rol = 2;
        $user->name = $request->name;
        $user->paternal = $request->paternal;
        $user->maternal = $request->maternal;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->email = $request->email;
        //falta encriptar
        $user->password = $request->password;
        $user->ci = $request->ci;
        $user->cellphone = $request->cellphone;
        $user->phone = $request->phone;
        //$user->save();

        $teacher = new Teacher();
        $user_id = User::where("ci","=",$user->ci)->first();

        $teacher->id_user = $user_id;
        $teacher->specialty = $request->speciality;
        if(Input::hasFile('cv')){
            $file=Input::file('cv');
            $file->move(public_path().'/documents/teachers/',$file->getClientOriginalName());
            $teacher->cv = $file;
        }

        $teacher->teachercol = $request->teacherSchool;
        $teacher->save();

        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
