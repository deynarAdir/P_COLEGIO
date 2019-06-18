<?php

namespace App\Http\Controllers;

use App\Degree;
use App\Document;
use App\FeeType;
use App\Manager;
use App\Parallel;
use App\Rol;
use App\Student;
use App\StudentFee;
use App\User;
use App\inscription;
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
        $types=FeeType::all();
        $parallels=Parallel::all();
        $users=User::with(['manager','rol'])->where('id_rol','2')->get();
        return view('inscriptions.index',[
            'degrees' => $degrees,
            'parallels' => $parallels,
            'users' => $users,
            'types' => $types
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
        $fecha_inicial = date('2019-01-01');
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
        $user->id_rol = '4';

        $user->save();
        $user = User::all()->last();

        $student->id_user= $user->iduser;
        $student->id_manager = $request->id_manager;
        $student->id_degree = $request->id_degree;
        $student->id_parallel = $request->id_parallel;
        $student->id_fee = $request->id_fee;
        $student->student_status ='0';
        $student->blood_type = $request->blood_type;
        $student->age = $request->age;

        $student->save();
        $fee = FeeType::findOrFail($request->id_fee);
        $type_price = FeeType::first();
        $price = $type_price->price;
        $price_t = ($price * 10) / $fee->description;
        $student = Student::all()->last();
        $div = 10 / $request->id_fee;
        for($i = 1; $i <= $fee->description; $i++){
            $fecha_inicial = date("Y-m-d",strtotime($fecha_inicial."+ ".$div." month"));
            $fecha_final = date("Y-m-d",strtotime($fecha_inicial."+ 27 days")); 
            $studentFee = new StudentFee;
            $studentFee->id_student = $student->idstudent;
            $studentFee->description = 'pagos si o si';
            $studentFee->price = $price_t;
            $studentFee->start_date = $fecha_inicial;
            $studentFee->end_date = $fecha_final;
            $studentFee->save(); 
        }
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
