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
                return redirect('index');
            }
            else{
                return redirect('login');
            }
        }
        else{
            return redirect('login');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('login');
    }

    public function index(){
        if (!session::get('login')) {
            return redirect('login');
        }else{
            
            return View('sekolah.index');
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
}

