<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
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
        $users = DB::table('users')->where('id_rol','=',2)->where('estate','=',1)->get();
        return view('teachers.index',[
            'users' => $users
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
        $user->save();

        $teacher = new Teacher();
        $user_id = User::where("ci","=",$user->ci)->first();

        $teacher->id_user = $user_id->iduser;
        $teacher->specialty = $request->speciality;
        $teacher->num_item = $request->numberItem;
        if(Input::hasFile('cv')){
            $file = Input::file('cv');
            $file->move(public_path().'\documents\teachers',$file->getClientOriginalName());
            $teacher->cv=$file->getClientOriginalName();
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
    public function edit( $id)
    {
        $user = User::findOrFail($id);
        $teacher = DB::table('teachers')->where('id_user','=',$id)->first();
        return view('teachers.edit',[
            'user' => $user,
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->paternal = $request->paternal;
        $user->maternal = $request->maternal;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->cellphone = $request->cellphone;
        $user->phone = $request->phone;
        $user->update();

        $teacher = Teacher::where('id_user','=',$id)->first();
        //$teacher = DB::table('teachers')->where('id_user','=',$id)->first(); ///////////////esto no genera un modelo eloquen por lo que no nos deja actualizar
        $teacher->specialty = $request->speciality;
        $teacher->teachercol = $request->teacherSchool;
        $teacher->save();
        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy( $teacher)
    {
        $teacher = User::findOrFail($teacher);
        $teacher->estate = 0;
        $teacher->update();
        return redirect()->route('teacher.index');
    }
}
