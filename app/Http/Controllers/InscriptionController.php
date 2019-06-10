<?php

namespace App\Http\Controllers;

use App\inscription;
use App\Degree;
use App\Parallel;
use App\User;
use App\Rol;
use App\Document;
use App\Manager;
use App\Student;

use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degrees=Degree::all();
        $parallels=Parallel::all();
        $users=User::with(['manager','rol'])->where('id_rol','2')->get();
        return view('inscriptions.index',[
            'degrees' => $degrees,
            'parallels' => $parallels,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $document = new Document;
        $student = new Student;

        $user = new User;


        $user->name = $request->name;
        $user->paternal = $request->paternal;
        $user->maternal = $request->maternal;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->ci);
        $user->ci =$request->ci;
        $user->cellphone = $request->cellphone;
        $user->id_rol = '3';

        $user->save();
        $user = User::all()->last();

        $student->id_user= $user->iduser;
        $student->id_manager = $request->id_manager;
        $student->id_degree = $request->id_degree;
        $student->id_parallel = $request->id_parallel;
        $student->student_status ='0';
        $student->blood_type = $request->blood_type;
        $student->age = $request->age;

        $student->save();
        $student = Student::all()->last();

        //$degrees->quantity =$degrees->quatity + '1';
        //$degrees->save();

        $document->id_student = $student->idstudent;
        $document->rude = $request->rude;
        $document->ci_photocopy = $request->ci_photocopy;
        $document->birth_certificate_original = $request->birth_certificate_original;
        $document->photocopy_legalized_notebook = $request->photocopy_legalized_notebook;
        $document->original_notepad = $request->original_notepad;

        $document->save();

        return redirect()->route('students.index');

        //return ($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function show(inscription $inscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function edit(inscription $inscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inscription $inscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(inscription $inscription)
    {
        //
    }
}
