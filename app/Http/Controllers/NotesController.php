<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SubjectTeacherDetails;
use App\Subject;
use App\Teacher;
use App\Degree;
use App\Assignments;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
//use App\Http\Requests\IngresoFormRequest;
use DB;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->iduser;
        $subjects=DB::table('users as u')
        ->join('teachers as t','u.iduser','=','t.id_user')
        ->join('subject_teacher_details as st','t.idteacher','=','st.id_teacher')
        ->join('subject_details as sd', 'st.id_subject_detail','=','sd.idsubject_detail')
        ->join('subjects as s','sd.id_subject','=','s.idsubject')
        ->join('degrees as d','sd.id_degree','=','d.iddegree')
        ->select('s.name as subject','d.name as degree','d.iddegree','st.idsubject_teacher_detail')
        ->where('u.iduser','=',$id)->get();
        return view('notes.index',['subjects'=>$subjects]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignments=DB::table('assignments as a')
        ->join('subject_student_details as st','a.id_subject_student_detail','=','st.idsubject_student_detail')
        ->join('students as s','st.id_student','=','s.idstudent')
        ->join('users as u','s.id_user','=','u.iduser')
        ->select('u.name','u.paternal','u.maternal','u.ci','s.rude','a.assignment','a.b1','a.b2','a.b3','a.b4','a.id_subject_teacher_detail')
        ->where('a.id_subject_teacher_detail','=',$id)->get();
        return view('notes.show',["assignments"=>$assignments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $asignment=Assignments::findOrFail($id);
        $asignment->b1=$request->get('b1');
        $asignment->b2=$request->get('b2');
        $asignment->b3=$request->get('b3');
        $asignment->b4=$request->get('b4');
        $asignment->update();

        $id = auth()->user()->iduser;
        $subjects=DB::table('users as u')
        ->join('teachers as t','u.iduser','=','t.id_user')
        ->join('subject_teacher_details as st','t.idteacher','=','st.id_teacher')
        ->join('subject_details as sd', 'st.id_subject_detail','=','sd.idsubject_detail')
        ->join('subjects as s','sd.id_subject','=','s.idsubject')
        ->join('degrees as d','sd.id_degree','=','d.iddegree')
        ->select('s.name as subject','d.name as degree','d.iddegree','st.idsubject_teacher_detail')
        ->where('u.iduser','=',$id)->get();
        return view('notes.index',['subjects'=>$subjects]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
