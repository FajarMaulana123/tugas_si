<?php

namespace App\Http\Controllers;

use View;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\ModelSekolah;
use App\ModelSiswa;
use App\ModelTahun;
use App\ModelSpp;
use App\ModelPembayaran;

class Sekolah extends Controller
{
    
    public function login(){
        return View('sekolah.login');
    }

    public function loginpost(Request $request){
        $email = $request->email;
        $password = $request->password;
        $data = ModelSekolah::where('email',$email)->first();
        if($data){ 
            if(Hash::check($password,$data->password)){
                Session::put('id_sekolah',$data->id_sekolah);
                Session::put('nama_sekolah',$data->nama_sekolah);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('index')->with('success', 'Login Berhasil');
            }
            else{
                return redirect('login')->with('info', 'email / password Salah');
            }
        }
        else{
            return redirect('login')->with('info', 'username / password Salah');
        }
    }

    public function gantipass(Request $request, $id){
        // $data = $request->all();
        $sekolah = ModelSekolah::where('id_sekolah',$id)->first();
        $pass = $sekolah->password;

        if(\Hash::check($request->input('curpass'), $pass))
        {
            $data = ModelSekolah::find($id);
            $data->password = \Hash::make($request->input('newpass'));
            $data->save();
            return redirect('/login')->with('success', 'Password berhasil diganti');
        } else {
            return back()->with('error','Password lama anda salah');
        }



    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('success', 'Logout Berhasil');
    }

    public function index(){
        if (!session::get('login')) {
            return redirect('login');
        }else{
            $totalsiswa = ModelSiswa::count();
            
            return View('sekolah.index', compact('totalsiswa'));
        }
    }

    public function datasiswa(){
        if (!session::get('login')) {
            return redirect('login');
        }else{
            $siswa = ModelSiswa::orderBy('id_siswa', 'DESC')->get();
            $tahun = ModelTahun::all();
            return View('sekolah.datasiswa', compact('siswa', 'tahun'));
        }
    }

    public function tambahsiswa(Request $request){
        $data = new ModelSiswa;
        $data->id_sekolah = $request->id_sekolah;
        $data->nisn = $request->nisn;
        $data->nama_siswa = $request->nama_siswa;
        $data->kelas = $request->kelas;
        $data->sekolah = $request->sekolah;
        $data->tahun_ajaran = $request->tahun_ajaran;
        $data->save();

        return redirect('/datasiswa')->with('success', 'Data Siswa tersimpan');
    }

    public function editsiswa(Request $request, $id){
        $siswa = ModelSiswa::find($id);
        $siswa->update($request->all());

        // ModelSiswa::where('id_siswa', $id)->update([
        //     'nisn' => $request->nisn,
        //     'nama_siswa' => $request->nama_siswa,
        //     'kelas' => $request->kelas,
        //     'tahun_ajaran' => $request->tahun_ajaran,
        // ]);
        return redirect('/datasiswa')->with('success', 'Data Siswa tersimpan');

    }

    public function hapussiswa($id){
        $siswa = ModelSiswa::where('id_siswa',$id)->delete();
    	return redirect('/datasiswa')->with('success', 'Data Siswa terhapus');
    }

    public function tahun(Request $request){
        $tahun = new ModelTahun;
        $tahun->tahun_ajaran = $request->tahun_ajaran;
        $tahun->save();
        return redirect('/datasiswa')->with('success', 'Data Tahun / Ajaran tersimpan');
    }

    public function spp(){
        if (!session::get('login')) {
            return redirect('login');
        }else{
            $tahun = ModelTahun::all();
            $data = ModelSpp::orderBy('id_tarifspp', 'DESC')->get();

            return View('sekolah.spp', compact('tahun', 'data'));
        }
    }

    public function tarif(Request $request){
        $data = new ModelSpp;
        $data->tahun_ajaran = $request->tahun_ajaran;
        $data->bulan = $request->bulan;
        $data->tarif_spp = $request->tarif_spp;
        $data->save();
        return redirect('/spp')->with('success', 'Data Tagihan tersimpan');;
    }

    public function hapustarif($id){
        $data = ModelSpp::where('id_tarifspp',$id)->delete();
    	return redirect('/spp')->with('success', 'Data Tagihan terhapus');
    }

    public function datapembayaran(){
        if (!session::get('login')) {
            return redirect('login');
        }else{
        $data = ModelPembayaran::orderBy('id_pembayaran', 'DESC')->get();
        return View('sekolah.datapembayaran', compact('data'));
        }
    }

    public function status(Request $request){
        $id = $request->id;
        $data = ModelPembayaran::find($id);
        $data->update([
            'status' => $request->status,
        ]);

        return redirect('/datapembayaran')->with('success', 'Data Tersimpan');
    }
    
}

