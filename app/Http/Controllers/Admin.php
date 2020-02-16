<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\ModelAdmin;
use App\ModelSekolah;

class Admin extends Controller
{
    public function login(){
        return View('admin.login');
    }

    public function loginpost(Request $request){
        $username = $request->username;
        $password = $request->password;
        $data = ModelAdmin::where('username',$username)->first();
        if($data){ 
            if(Hash::check($password,$data->password)){
                Session::put('id_admin',$data->id_admin);
                Session::put('username',$data->username);
                Session::put('loginadmin',TRUE);
                return redirect('/admin')->with('success', 'Login Berhasil');
            }
            else{
                return redirect('/loginadmin')->with('info', 'username / password Salah');
            }
        }
        else{
            return redirect('/loginadmin')->with('info', 'username / password Salah');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/loginadmin')->with('success', 'Logout Berhasil');
    }

    public function gantipassadmin(Request $request, $id){
        // $data = $request->all();
        $admin = ModelAdmin::where('id_admin',$id)->first();
        $pass = $admin->password;

        if(\Hash::check($request->input('curpass'), $pass))
        {
            $data = Modeladmin::find($id);
            $data->password = \Hash::make($request->input('newpass'));
            $data->save();
            return redirect('/loginadmin')->with('success', 'Password berhasil diganti');
        } else {
            return back()->with('error','Password lama anda salah');
        }

    }

    public function index(){
        if (!session::get('loginadmin')) {
            return redirect('/loginadmin');
        }else{
            $totalsekolah = ModelSekolah::count();
            return View('admin.index', compact('totalsekolah'));
        }
    }

    public function datasekolah(){
        if (!session::get('loginadmin')) {
            return redirect('/loginadmin');
        }else{
            $data = ModelSekolah::orderBy('id_sekolah', 'DESC')->get();
            return View('admin.datasekolah', compact('data'));
        }
    }

    public function daftarsekolah(){
        if (!session::get('loginadmin')) {
            return redirect('/loginadmin');
        }else{
            return View('admin.daftar');
        }
    }

    public function hapussekolah($id){
        $sekolah = ModelSekolah::where('id_sekolah',$id)->delete();
    	return redirect('/datasekolah')->with('success', 'Data Sekolah terhapus');
    }

    public function daftar(Request $request){
        $data = new ModelSekolah();
        $data->nama_sekolah = $request->nama_sekolah;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('/datasekolah')->with('success', 'Data Sekolah tersimpan');
    }


}
