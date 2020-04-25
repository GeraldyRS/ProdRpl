<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\jadwal;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_user = \App\User::where('name','LIKE','%'.$request->cari.'%')->get();
        }else {
            $data_user = \App\User::all();
        }

        return view('User.index',['data_user'=>$data_user]);
    }

    public function create(Request $request)
    {
        $user = \App\User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'nis' => $request['nis'],
            'role' => $request['role'],
        ]);
        return redirect('/user')->with('sukses','Data Berhasil di Input');
    }

    public static function quickRandom($length = 16)
{
$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
}

    public function edit(Request $request, $id)
    {
        $row=$request->no;
        $id= DB::select("SELECT MAX(id_jadwal) AS id FROM jadwal");
        foreach ($id as $ids) {
            $newid= ($ids->id)+1;
        for ($i=1; $i <= $row; $i++) { 
            $jadwal = \App\jadwal::create([
                'id_jadwal' => $newid,
                'tanggal' => $request->tanggal,
                'mulai' => $request->input('mulai'.$i),
                'selesai' => $request->input('selesai'.$i),
                'kegiatan' => $request->input('kegiatan'.$i),
                'lampiran' => $request->input('r'.$i),
                'mapel' => $request->input('mapel'.$i),
            ]);
        }
        }
        return redirect('/dashboard');
    }

    public function update(Request $request, $id)
    {
        $user = \App\User::find($id);
        $user->update($request->all());
        return redirect ('/user')->with('sukses','Data Berhasil diupdate');
    }

    public function delete($id)
    {
        $user = \App\User::find($id);
        $user->delete($user);
        return redirect('/user');
    }

    public function profile($id)
    {
        $profile= \App\User::find($id);
        return view('Siswa.profile',compact('profile'));
    }

   /* public function ganti_password(Request $request)
    {
        $user = DB::table('users')->where('id',$request->id)->get();

        foreach($user as $u)
        {
            if (Hash::check($request->password_lama,$u->password )) {
                $user = DB::table('users')->where('id',$request->id)->update([
                    'password' => bcrypt($request->password),
                ]);
                return redirect()
                ->back()->with('alert','Selamat password Anda berhasil diubah');
            }
            else{
                return redirect()
                ->back()->with('alert','Maaf password gagal diubah, password yang Anda masukkan salah');
            }

        }


    }*/
}
