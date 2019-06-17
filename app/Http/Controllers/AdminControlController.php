<?php

namespace App\Http\Controllers;

use App\AdminControl;
use Illuminate\Http\Request;
use App\User;

class AdminControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::searchUser($request->searchName)->where('estate',1)->get();
        return view('assistancePersonal.listStart', compact('users'));
    }

    public function indexOut(){
        $user = AdminControl::where('end_time','00:00')->get();
        return view('assistancePersonal.listEnd', compact('user'));
    }

    public function create(Request $request)
    {
       //
    }

    public function createStart(Request $request, $id){
       $date = date('Y-m-d');
       $time = date('H:i');
       $users = User::findOrFail($id);
       return view('assistancePersonal.createStart',compact('date','time','users'));
   }

    public function createEnd($id)
    {
        $date = date('Y-m-d');
        $time = date('H:i');
        $control = AdminControl::findOrFail($id);
        $users = User::where('iduser','=',$control->id_user)->first();
        return view('assistancePersonal.createEnd',compact('date','time','users','control'));
    }

    public function store(Request $request)
    {
        $assistance = new AdminControl;
        $assistance->id_user = $request->idUser;
        $assistance->date = $request->date;
        $assistance->start_time = $request->timeStart;
        $assistance->end_time = '00:00';
        $assistance->save();
        return redirect()->route('assistancePersonal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminControl  $adminControl
     * @return \Illuminate\Http\Response
     */
    public function show(AdminControl $adminControl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminControl  $adminControl
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminControl $adminControl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminControl  $adminControl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $control = AdminControl::findOrFail($id);
        $control->end_time = $request->timeEnd;
        if($request->timeExtra){
            $ex = ':00';
            $extra = $request->timeExtra.$ex;
            $control->extra = $request->timeExtra;
        }
        $control->update();

        return redirect()->route('assistancePersonal.indexOut');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminControl  $adminControl
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminControl $adminControl)
    {
        //
    }
}
