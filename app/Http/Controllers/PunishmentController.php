<?php

namespace App\Http\Controllers;

use App\Punishment;
use Illuminate\Http\Request;

class PunishmentController extends Controller
{
    public function index()
    {
        $p = Punishment::all();
        return view('punishments.index',[
            'p' => $p
        ]);
    }
    public function edit($id,$time)
    {
        $data = [];
        $p = Punishment::findOrFail($id);
        if($time == 1){
            $data['idpunishment'] =  $p->idpunishment;
            $data['punishment'] =  $p->punishment1;
            $data['time'] = 1;
            // return $data;
            return view('punishments.edit',[
                'data' => $data
            ]);
        }else if($time == 2){
            $data['idpunishment'] =  $p->idpunishment;
            $data['punishment'] =  $p->punishment2;
            $data['time'] = 2;
            return view('punishments.edit',[
                'data' => $data
            ]);
        }
        return;
    }
    public function update(Request $request, $id,$time)
    {
        $p = Punishment::findOrFail($id);
        if($time == 1){
            $p->punishment1 = $request->punishment;
            $p->save();
            return redirect()->route('configuration.index');
        }else if($time == 2){
            $p->punishment2 = $request->punishment;
            $p->save();
            return redirect()->route('configuration.index');
        }
    }
}
