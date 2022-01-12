<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Suplier;

class SuplierController extends Controller
{
    public function index(){
        $suplier=Suplier::orderBy('created_at','desc')->get();
        return view('app.data_suplier.view',['suplier'=>$suplier]);
    }
    
    public function suplier_add(Request $req){
        $nama=$req->input('nama');
        $alamat=$req->input('alamat');
        $email=$req->input('email');
        $no_hp=$req->input('no_hp');
        $no_rekening=$req->input('no_rekening');

        Suplier::create([
            'nama_suplier'=>$nama,
            'alamat_suplier'=>$alamat,
            'email'=>$email,
            'no_hp'=>$no_hp,
            'no_rekening'=>$no_rekening

        ]);
        
        return redirect()->back()->with('success','Data Suplier Baru Berhasil di tambahkan');

    }
    public function suplier_update($id, Request $req){
        $nama=$req->input('nama');
        $alamat=$req->input('alamat');
        $email=$req->input('email');
        $no_hp=$req->input('no_hp');
        $no_rekening=$req->input('no_rekening');
        
        $suplier=Suplier::find($id);
        $suplier->nama_suplier=$nama;
        $suplier->alamat_suplier=$alamat;
        $suplier->email=$email;
        $suplier->no_hp=$no_hp;
        $suplier->no_rekening=$no_rekening;
        $suplier->save();
        return redirect()->back()->with('success','Data Berhasil di Ubah');

      

    }

    public function suplier_delete($id){
        $suplier=Suplier::find($id);
        $suplier->delete();
        return redirect()->back()->with('success','Data Suplier Berhasil di hapus');
    }
   
}