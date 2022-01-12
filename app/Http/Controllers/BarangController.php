<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Reader\Xls\RC4;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class BarangController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $barang=Barang::orderBy('created_at','desc')->get();
        
        return view('app.data_barang.view',['barang'=>$barang]);
    }
    public function nama_barang(Request $req){
        $barang=Barang::select('harga')->where('id_barang',$req->id_barang)->first();
        
        return response()->json($barang);
    }

    public function add_barang( Request $req){

        $nama= $req->input('nama');
        $stok=$req->input('stok');
        $harga=$req->input('harga');

        Barang::create([
            'nama_barang'=>request('nama'),
            'stok'=>request('stok'),
            'harga'=>request('harga')
        ]);
        return redirect()->back()->with('success','Data barang berhasil di tambahkan');
    }
    public function update_barang($id,Request $req){
        $nama=$req->input('nama');
        $stok=$req->input('stok');
        $harga=$req->input('harga');
            
        $barang=Barang::find($id);
        $barang->nama_barang=$nama;
        $barang->stok=$stok;
        $barang->harga=$harga;
        $barang->save();
        return redirect()->back()->with('success','Data barang berhasil di edit');
    }
    public function delete_barang($id){
        $barang=Barang::find($id);
        $barang->delete();

        return redirect()->back()->with('success','Data berhasil di hapus');
    }
}