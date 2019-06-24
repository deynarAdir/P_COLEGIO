<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Degree;
use App\SubjectDetail;
use Illuminate\Support\Facades\Redirect;
use DB;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $s = Subject::all();
        return view('subjects.index' , [
            'subjects' => $s
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $degree = Degree::all();
        return view('subjects.create',['degree'=>$degree]);
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
            $s = new Subject;
            $s->name = $request->get('name');
            $s->save();

            $iddegree= $request->get('iddegree');
            $count=0;
            while ( $count < count($iddegree)) {
                $detail= new SubjectDetail;
                $detail->id_degree = $iddegree[$count];
                $detail->id_subject = $s->idsubject;
                $detail->save();
                $count=$count+1;
            }
             

            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();   
        }
                     
        
        
        return Redirect::to('subjects');
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
        $s = Subject::find($id);
        return view('subjects.edit',[
            'subject' => $s
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
        $s = Subject::find($id);
        $s->name = $request->name;
        $s->save();
        return redirect()->to('materias');
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
