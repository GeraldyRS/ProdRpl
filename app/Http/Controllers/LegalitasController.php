<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\MaklonPkp;
use \App\Maklon;
use \App\maklonProject;
use \App\legalitas;
use DB;
use Carbon;
use Session;
use Auth;
use App\Notifications\NotifyLegalitasSubmit;
use App\Notifications\NotifyLegalitasReview;
class LegalitasController extends Controller
{
    public function legalitas(Request $request, $id, $maklon_id)
 {

        $project = DB::table('maklon_project')->latest()->first();
        $timeStamp = date("Y-m-d H:i:s");

        if($request->hasFile('akta_pendirian'))
        {
            $legal = $request->file('akta_pendirian')->getClientOriginalName();
        }
        if($request->hasFile('akta_wewenang_direksi'))
        {
            $legal = $request->file('akta_wewenang_direksi')->getClientOriginalName();
        }
        $legalitas = \App\legalitas::create([
            "maklon_id" => $maklon_id,
            "project_id" => $project->project_id,
            "akta_pendirian"=> $request->akta_pendirian,
            "akta_penyesuaian"=> $request->akta_penyesuaian,
            "akta_susunan_direksi"=> $request->akta_susunan_direksi,
            "akta_wewenang_direksi"=> $request->akta_wewenang,
            "siup"=> $request->siup,
            "nib"=> $request->nib,
            "tdp"=> $request->tdp,
            "iui"=> $request->iui,
            "npwp"=> $request->npwp,
            "izin_domisili"=> $request->izin_domisili,
            "izin_lingkungan"=> $request->izin_lingkungan,
            "akta_pengurus"=> $request->akta_pengurus,
            "psb"=>$request->psb,
            "ktp"=> $request->ktp,
            "iumk"=> $request->iumk,
            "sppl_amdal_ukl_upl"=> $request->sppl_amdal_ukl_upl,
            "sppk"=> $request->sppk,
            "legalitas_upload"=>$timeStamp,
        ]);

        if($request->hasFile('akta_pendirian'))
        {
            $request->file('akta_pendirian')->move('file/',$request->file('akta_pendirian')->getClientOriginalName());
            $legalitas->akta_pendirian = $request->file('akta_pendirian')->getClientOriginalName();
            $legalitas->save();
        }
        if($request->hasFile('akta_wewenang_direksi'))
        {
            $request->file('akta_wewenang_direksi')->move('file/',$request->file('akta_wewenang_direksi')->getClientOriginalName());
            $legalitas->akta_wewenang_direksi = $request->file('akta_wewenang_direksi')->getClientOriginalName();
            $legalitas->save();
        }
        if($request->hasFile('akta_penyesuaian'))
        {
        $request->file('akta_penyesuaian')->move('file/',$request->file('akta_penyesuaian')->getClientOriginalName());
        $legalitas->akta_penyesuaian = $request->file('akta_penyesuaian')->getClientOriginalName() ;
        $legalitas->save();
        }
        if($request->hasFile('akta_susunan_direksi'))
        {
        $request->file('akta_susunan_direksi')->move('file/',$request->file('akta_susunan_direksi')->getClientOriginalName());
        $legalitas->akta_susunan_direksi = $request->file('akta_susunan_direksi')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('siup'))
        {
        $request->file('siup')->move('file/',$request->file('siup')->getClientOriginalName());
        $legalitas->siup = $request->file('siup')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('nib'))
        {
        $request->file('nib')->move('file/',$request->file('nib')->getClientOriginalName());
        $legalitas->nib = $request->file('nib')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('tdp'))
        {
        $request->file('tdp')->move('file/',$request->file('tdp')->getClientOriginalName());
        $legalitas->tdp = $request->file('tdp')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('psb'))
        {
        $request->file('psb')->move('file/',$request->file('psb')->getClientOriginalName());
        $legalitas->psb = $request->file('psb')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('iui'))
        {
        $request->file('iui')->move('file/',$request->file('iui')->getClientOriginalName());
        $legalitas->iui = $request->file('iui')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('npwp'))
        {
        $request->file('npwp')->move('file/',$request->file('npwp')->getClientOriginalName());
        $legalitas->npwp = $request->file('npwp')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('ktp'))
        {
        $request->file('ktp')->move('file/',$request->file('ktp')->getClientOriginalName());
        $legalitas->ktp = $request->file('ktp')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('izin_domisili'))
        {
        $request->file('izin_domisili')->move('file/',$request->file('izin_domisili')->getClientOriginalName());
        $legalitas->izin_domisili = $request->file('izin_domisili')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('izin_lingkungan'))
        {
        $request->file('izin_lingkungan')->move('file/',$request->file('izin_lingkungan')->getClientOriginalName());
        $legalitas->izin_lingkungan = $request->file('izin_lingkungan')->getClientOriginalName();
        $legalitas->save();
        }        
        if($request->hasFile('akta_pengurus'))
        {
        $request->file('akta_pengurus')->move('file/',$request->file('akta_pengurus')->getClientOriginalName());
        $legalitas->akta_pengurus = $request->file('akta_pengurus')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('iumk'))
        {
        $request->file('iumk')->move('file/',$request->file('iumk')->getClientOriginalName());
        $legalitas->iumk = $request->file('iumk')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('sppl_amdal_ukl_upl'))
        {
        $request->file('sppl_amdal_ukl_upl')->move('file/',$request->file('sppl_amdal_ukl_upl')->getClientOriginalName());
        $legalitas->sppl_amdal_ukl_upl = $request->file('sppl_amdal_ukl_upl')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('sppk'))
        {
        $request->file('sppk')->move('file/',$request->file('sppk')->getClientOriginalName());
        $legalitas->sppk = $request->file('sppk')->getClientOriginalName();
        $legalitas->save();
        } 
        $legalitas->email = auth::user()->email;
        $legalitas->notify(new NotifyLegalitasSubmit($legalitas));
        return redirect()->back()->with('sukses', 'Data Berhasil di Update');
     }

    public function info_legalitas($id , $maklon_id)
    {
        $project = $id;
        $projects = DB::table('project')->where('id', $id)->get();
        $maklon_sementara = $maklon_id;
        $maklon = $maklon_id;
        $legalitasz = DB::table('legalitas')->where([
            ['project_id', $id],
            ['maklon_id', $maklon_id]
            ])->first();
            $maklons = \App\maklonProject::where([
                ['project_id',$id],
                ['maklon_id',$maklon_id],
            ])->get();
        $maklon_project = DB::table('maklon_project')->where([
            ['project_id', $id],
            ['maklon_id', $maklon_id]
        ])->get();
        $legal = \App\legalitas::all();
        $statusCek = \App\legalitas::all();
        $legalitas =DB::table('legalitas')->where([
            ['project_id', $id],
            ['maklon_id', $maklon_id]
            ])->get();
            // dd($legalitasz);
        return view('Project.wizard.info4',compact('project', 'projects','legalitas','legalitasz','maklons', 'maklon_sementara','maklon', 'maklon_project'));
    }

            public function update_legal(Request $request,$id)
            {
                $legalitas = legalitas::findOrFail($id);
                $timeStamp = date("Y-m-d H:i:s");
                if($request->hasFile('akta_pendirian')){
                    $aktePendirian = $request->akta_pendirian;
                }else{
                    $aktePendirian = $legalitas->akta_pendirian;
                }
                if($request->hasFile('akta_penyesuaian')){
                    $aktaPenyesuaian = $request->akta_penyesuaian;
                }else{
                    $aktaPenyesuaian = $legalitas->akta_penyesuaian;
                }
                if($request->hasFile('akta_susunan_direksi')){
                    $aktaSusunanDireksi = $request->akta_susunan_direksi;
                }else{
                    $aktaSusunanDireksi = $legalitas->akta_susunan_direksi;
                }
                if($request->hasFile('akta_wewenang_direksi')){
                    $aktaWewenangDireksi = $request->akta_wewenang_direksi;
                }else{
                    $aktaWewenangDireksi = $legalitas->akta_wewenang_direksi;
                }
                if($request->hasFile('akta_pengurus')){
                    $aktaPengurus = $request->akta_pengurus;
                }else{
                    $aktaPengurus = $legalitas->akta_pengurus;
                }
                if($request->hasFile('siup')){
                    $siup = $request->siup;
                }else{
                    $siup = $legalitas->siup;
                }
                if($request->hasFile('nib')){
                    $nib = $request->nib;
                }else{
                    $nib = $legalitas->nib;
                }
                if($request->hasFile('tdp')){
                    $tdp = $request->tdp;
                }else{
                    $tdp = $legalitas->tdp;
                }
                if($request->hasFile('iui')){
                    $iui = $request->iui;
                }else{
                    $iui = $legalitas->iui;
                }
                if($request->hasFile('npwp')){
                    $npwp = $request->npwp;
                }else{
                    $npwp = $legalitas->npwp;
                }
                if($request->hasFile('izin_domisili')){
                    $izinDomisili = $request->izin_domisili;
                }else{
                    $izinDomisili = $legalitas->izin_domisili;
                }
                if($request->hasFile('izin_lingkungan')){
                    $izinLingkungan = $request->izin_lingkungan;
                }else{
                    $izinLingkungan = $legalitas->izin_lingkungan;
                }
                if($request->hasFile('ktp')){
                    $ktp = $request->ktp;
                }else{
                    $ktp = $legalitas->ktp;
                }
                if($request->hasFile('iumk')){
                    $iumk = $request->iumk;
                }else{
                    $iumk = $legalitas->iumk;
                }
                if($request->hasFile('psb')){
                    $psb = $request->psb;
                }else{
                    $psb = $legalitas->psb;
                }
                if($request->hasFile('sppl_amdal_ukl_upl')){
                    $sppl = $request->sppl_amdal_ukl_upl;
                }else{
                    $sppl = $legalitas->sppl_amdal_ukl_upl;
                }
                if($request->hasFile('sppk')){
                    $sppk = $request->sppk;
                }else{
                    $sppk = $legalitas->sppk;
                }
                $legalitas->update([
                "akta_pendirian"=> $aktePendirian,
                "akta_penyesuaian"=> $aktaPenyesuaian,
                "akta_susunan_direksi"=> $aktaSusunanDireksi,
                "akta_wewenang_direksi"=> $aktaWewenangDireksi,
                "siup"=> $siup,
                "nib"=> $nib,
                "tdp"=> $tdp,
                "iui"=> $iui,
                "npwp"=> $npwp,
                "izin_domisili"=> $izinDomisili,
                "izin_lingkungan"=> $izinLingkungan,
                "akta_pengurus"=> $aktaPengurus,
                "psb"=>$psb,
                "ktp"=> $ktp,
                "iumk"=> $iumk,
                "sppl_amdal_ukl_upl"=> $sppl,
                "sppk"=> $sppk,
                "legalitas_upload"=>$timeStamp,
                ]);
                if($request->hasFile('akta_pendirian'))
        {
            $request->file('akta_pendirian')->move('file/',$request->file('akta_pendirian')->getClientOriginalName());
            $legalitas->akta_pendirian = $request->file('akta_pendirian')->getClientOriginalName();
            $legalitas->save();
        }
       c
            $request->file('akta_wewenang_direksi')->move('file/',$request->file('akta_wewenang_direksi')->getClientOriginalName());
            $legalitas->akta_wewenang_direksi = $request->file('akta_wewenang_direksi')->getClientOriginalName();
            $legalitas->save();
        }
        if($request->hasFile('akta_penyesuaian'))
        {
        $request->file('akta_penyesuaian')->move('file/',$request->file('akta_penyesuaian')->getClientOriginalName());
        $legalitas->akta_penyesuaian = $request->file('akta_penyesuaian')->getClientOriginalName() ;
        $legalitas->save();
        }
        if($request->hasFile('akta_susunan_direksi'))
        {
        $request->file('akta_susunan_direksi')->move('file/',$request->file('akta_susunan_direksi')->getClientOriginalName());
        $legalitas->akta_susunan_direksi = $request->file('akta_susunan_direksi')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('siup'))
        {
        $request->file('siup')->move('file/',$request->file('siup')->getClientOriginalName());
        $legalitas->siup = $request->file('siup')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('nib'))
        {
        $request->file('nib')->move('file/',$request->file('nib')->getClientOriginalName());
        $legalitas->nib = $request->file('nib')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('tdp'))
        {
        $request->file('tdp')->move('file/',$request->file('tdp')->getClientOriginalName());
        $legalitas->tdp = $request->file('tdp')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('psb'))
        {
        $request->file('psb')->move('file/',$request->file('psb')->getClientOriginalName());
        $legalitas->psb = $request->file('psb')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('iui'))
        {
        $request->file('iui')->move('file/',$request->file('iui')->getClientOriginalName());
        $legalitas->iui = $request->file('iui')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('npwp'))
        {
        $request->file('npwp')->move('file/',$request->file('npwp')->getClientOriginalName());
        $legalitas->npwp = $request->file('npwp')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('ktp'))
        {
        $request->file('ktp')->move('file/',$request->file('ktp')->getClientOriginalName());
        $legalitas->ktp = $request->file('ktp')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('izin_domisili'))
        {
        $request->file('izin_domisili')->move('file/',$request->file('izin_domisili')->getClientOriginalName());
        $legalitas->izin_domisili = $request->file('izin_domisili')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('izin_lingkungan'))
        {
        $request->file('izin_lingkungan')->move('file/',$request->file('izin_lingkungan')->getClientOriginalName());
        $legalitas->izin_lingkungan = $request->file('izin_lingkungan')->getClientOriginalName();
        $legalitas->save();
        }        
        if($request->hasFile('akta_pengurus'))
        {
        $request->file('akta_pengurus')->move('file/',$request->file('akta_pengurus')->getClientOriginalName());
        $legalitas->akta_pengurus = $request->file('akta_pengurus')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('iumk'))
        {
        $request->file('iumk')->move('file/',$request->file('iumk')->getClientOriginalName());
        $legalitas->iumk = $request->file('iumk')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('sppl_amdal_ukl_upl'))
        {
        $request->file('sppl_amdal_ukl_upl')->move('file/',$request->file('sppl_amdal_ukl_upl')->getClientOriginalName());
        $legalitas->sppl_amdal_ukl_upl = $request->file('sppl_amdal_ukl_upl')->getClientOriginalName();
        $legalitas->save();
        }
        if($request->hasFile('sppk'))
        {
        $request->file('sppk')->move('file/',$request->file('sppk')->getClientOriginalName());
        $legalitas->sppk = $request->file('sppk')->getClientOriginalName();
        $legalitas->save();
        } 
                $legalitas->email = auth::user()->email;
                $legalitas->notify(new NotifyLegalitasSubmit($legalitas));
                return redirect()->back()->with('sukses', 'Data Berhasil di Update');
            }

            public function review(Request $request,$id)
            {
                $legalitas = legalitas::findOrFail($id);
                $legalitas->update([
                    "review"=>$request->review,
                ]);
                $legalitas->email = auth::user()->email;
                $legalitas->notify(new NotifyLegalitasReview($legalitas));
                return redirect()->back()->with('sukses', 'Data Berhasil di Update');
            }

    public function statusAktaPendirian($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_akta_pendirian' => 2,
        ]);
        return redirect()->back();
    }

    public function StatusPenyesuaian($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_akta_penyesuaian' => 2,
        ]);
        return redirect()->back();
    }

    public function StatusSusunanDireksi ($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_susunan_direksi' => 2,
        ]);
        return redirect()->back();
    }

    public function StatusWewenangDireksi($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_wewenang_direksi' => 2,
        ]);
        return redirect()->back();
    }

    public function StatusSiup($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_siup' => 2,
        ]);
        return redirect()->back();
    }

    public function StatusNib ($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_nib' => 2,
        ]);
        return redirect()->back();
    }

    public function StatusTdp ($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_tdp' => 2,
        ]);
        return redirect()->back();
    }

    public function StatusIui($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_iui' => 2,
        ]);
        return redirect()->back();
    }

    public function StatusNpwp ($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_npwp' => 2,
        ]);
        return redirect()->back();
    }

    public function StatusDomisili ($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_izin_domisili' => 2,
        ]);
        return redirect()->back();
    }

    public function StatusLingkungan ($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_izin_lingkungan' => 2,
        ]);
        return redirect()->back();
    }
    public function StatusPsb ($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_psb' => 2,
        ]);
        return redirect()->back();
    }


    public function StatusAktaPengurus($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_akta_pengurus' => 2,
        ]);
        return redirect()->back();
    }

    public function StatusKtp ($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_ktp' => 2,
        ]);
        return redirect()->back();
    }

    public function StatusIumk ($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_iumk' => 2,
        ]);
        return redirect()->back();
    }


    public function StatusAmdal ($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_sppl_amdal_ukl_upl' => 2,
        ]);
        return redirect()->back();
    }


    public function StatusSppk ($id)
    {
        $legalitas = legalitas::findOrFail($id);
        $legalitas->update([
            'status_sppk' => 2,
        ]);
        return redirect()->back();
    }
}