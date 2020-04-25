<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\MaklonPkp;
use  \App\Maklon;
use   \App\maklonProject;
use    \App\legalitas;
use     \App\file;
use      \App\penawaran;
use       \App\jadwal;
use DB;
use Carbon;
use Session;
use Auth;
use App\Notifications\NotifyMaklon;
use App\Notifications\NotifyFoodSafety;
use App\Notifications\NotifyKontrakKerjasama;
use App\Notifications\NotifyMouSubmit;
use App\Notifications\NotifyPenawaranSubmit;
use App\Notifications\NotifyPenawaranApproved;
use App\Notifications\NotifyTrialFinal;
use App\Notifications\NotifyPkpUpdate;


class ProjectController extends Controller
{
    public function index(Request $request)
    {

        return view('Project.index');
    }

    public function details($id)
    {
        $project = \App\Project::find($id);
        $maklon = DB::select("SELECT * FROM maklon_project
            JOIN maklon ON maklon_project.maklon_id = maklon.id
            WHERE project_id = $id");
        return view('Project.view',['project' => $project, 'maklon' => $maklon]);
    }
    public function create()
    {
        $select = DB::select("SELECT * FROM jadwal GROUP BY id_jadwal ORDER BY tanggal ASC");
        return view('Project.insert',compact('select'));
    }
    public function view($id)
    {
        $select = DB::select("SELECT * FROM jadwal WHERE id_jadwal = $id ORDER BY mulai ASC");
        return view('Project.view',compact('select'));
    }

    public function info(request $request, $id)
    {
        $jam=date('H:i');
        $hari=date('Y-m-d');
        $select = jadwal::findOrFail($id);
        if($select->tanggal > $hari){
            $status = 2;
        }
        else{
            if($select->selesai > $jam){
                $status = 2;
            }else{
            $status = 1;
        }
        }
        $select->update([
            "bukti"=>$request->bukti,
            "status"=>$status,
        ]);
         if($request->hasFile('bukti'))
        {
        $request->file('bukti')->move('file/',$request->file('bukti')->getClientOriginalName());
            $select->bukti = $request->file('bukti')->getClientOriginalName();
            $select->save();
    }
        return redirect()->back();
}
    public function delete($id)
    {
        $select = jadwal::findOrFail($id);
        $select->update([
            "bukti"=>"",
            "status"=>0,
        ]);
        return redirect()->back();
    }
    public function edit()
    {
        $select = DB::select("SELECT * FROM jadwal GROUP BY id_jadwal ORDER BY tanggal ASC");
        return view('dashboards.tabular',compact('select'));
    }
    public function edits($id)
    {
        $select = DB::select("SELECT * FROM jadwal WHERE id_jadwal = $id ORDER BY mulai ASC");
        return view('Project.edit',compact('select'));
    }
}