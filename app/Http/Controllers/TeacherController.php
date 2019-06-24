<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use App\Contract;
use App\TypeContract;
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
        $user = User::join('teachers','users.iduser','=','teachers.id_user')
            ->select('users.iduser','users.name', 'users.paternal','users.maternal', 'users.ci', 'users.cellphone',
                'teachers.idteacher', 'teachers.specialty')
            ->where('id_rol','=',3)->where('estate','=',1)->orderBy('iduser','desc')->get();
        return view('teachers.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeContract = TypeContract::all();
        return view('teachers.create', compact('typeContract'));
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
        $user->id_rol = 3;
        $user->name = $request->name;
        $user->paternal = $request->paternal;
        $user->maternal = $request->maternal;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->email = $request->email;
        //falta encriptar
        $user->password = bcrypt($request->password);
        $user->ci = $request->ci;
        $user->cellphone = $request->cellphone;
        $user->phone = $request->phone;
        $user->save();

        $teacher = new Teacher();

        $teacher->id_user = $user->iduser;
        $teacher->specialty = $request->speciality;
        $teacher->num_item = $request->numberItem;
        if(Input::hasFile('cv')){
            $file = Input::file('cv');
            $file->move(public_path().'\documents\teachers',$file->getClientOriginalName());
            $teacher->cv=$file->getClientOriginalName();
        }
        $teacher->save();

        $contract = new Contract();
        $contract->id_user = $user->iduser;
        $contract->id_type_contract = $request->typeContract;
        $contract->start_date = $request->dateStart;
        $contract->end_date = $request->dateEnd;
        $contract->payment = $request->payment;
        $contract->save();

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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $teacher = Teacher::where('id_user','=',$id)->first();
        return view('teachers.edit',compact('user','teacher'));
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
        $user->ci = $request->ci;
        $user->cellphone = $request->cellphone;
        $user->phone = $request->phone;
        $user->update();

        $teacher = Teacher::where('id_user','=',$id)->first();
        $teacher->specialty = $request->speciality;
        $teacher->num_item = $request->numberItem;
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
