<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SubjectTeacherDetails;
use App\Subject;
use App\Teacher;
use App\Degree;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;

class SubjectTeacherDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher=DB::table('users')
        ->select('iduser','name','paternal','maternal','ci')
        ->where('estate','=','1')
        ->where('id_rol','=','2')
        ->paginate(10);
        return view('subjectteacherdetail.index',['teacher'=>$teacher]);
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
        try {
            DB::beginTransaction();
            $idsubject_detail= $request->get('idsubject_detail');
            $idteacher= $request->get('idteacher');
            $cont=0;
            while ($cont < count($idsubject_detail)) {
                $detail=new SubjectTeacherDetails;
                $detail->id_teacher=$idteacher;
                $detail->id_subject_detail=$idsubject_detail[$cont];
                $detail->save();
                $cont=$cont+1;
            }
            
            DB::commit();            
        } catch (Exception $e) {
            DB::rollback();
        }
        return Redirect::to('subjectteacherdetail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher=DB::table('users')
        ->select('iduser','name','paternal','maternal','ci')
        ->where('iduser','=',$id)
        ->first();
        $teachers=DB::table('teachers')->where('id_user','=',$id)->first();
        $subject=DB::table('subject_details as s')
        ->join('degrees as d','s.id_degree','=','d.iddegree')
        ->join('subjects as sb','s.id_subject','=','sb.idsubject')
        ->select('s.idsubject_detail','d.iddegree','d.name as degree','sb.idsubject','sb.name as subject')
        ->get();
        return view('subjectteacherdetail.create',['teacher'=>$teacher,'teachers'=>$teachers,'subject'=>$subject]);
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
        //
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
