<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;

use App\ModelSiswa;
use App\ModelSpp;
use App\ModelPembayaran;

class Siswa extends Controller
{
    public function siswa(){

        return View('siswa.index');
    }

    public function carisiswa(Request $request){
        $cari = $request->nisn;

        $data = ModelSiswa::where('nisn', 'LIKE', '%'.$cari.'%')->first();
        $tarif = ModelSpp::where('tahun_ajaran', $data->tahun_ajaran)->get();
        $bayar = ModelPembayaran::where('nisn', $data->nisn)->get();

        return View('siswa.cari', compact('data', 'tarif', 'bayar'));
    }

    public function pembayaran(Request $request){
        $gam_produk = $request->file('bukti_tf');
		$namefile = $gam_produk->getClientOriginalName();
		$gam_produk->move(public_path('Foto'),$namefile);
        $status = 'Pending';

        $data = new ModelPembayaran;
        $data->nisn = $request->nisn;
        $data->nama_siswa = $request->nama_siswa;
        $data->kelas = $request->kelas;
        $data->sekolah = $request->sekolah;
        $data->tahun_ajaran = $request->tahun_ajaran;
        $data->bulan = $request->bulan;
        $data->bukti_tf = $namefile;
        $data->status = $status;
        $data->save();

        return back();
    }
}
