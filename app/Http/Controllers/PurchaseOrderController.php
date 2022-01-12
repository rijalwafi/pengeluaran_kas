<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

use App\PurchaseOrder;
use App\Suplier;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;

class PurchaseOrderController extends Controller
{
    public function index(){
        $data=PurchaseOrder::get();
     
       return view('App.data_po.view',['suplier'=>$data]);
    }
    public function add_po(){
        $suplier=Suplier::get();
        $barang=Barang::get();
        $last_id_po=DB::table('purchase_order')->max('id_po');
        $last_id_po++;
        $no=10;
    
        $today=date('ymd');
        $po_number='PO'.$today.$no.sprintf("%04d",$last_id_po);

        return view('app.data_po.add',['suplier'=>$suplier,'barang'=>$barang,'po_number'=>$po_number]);

    }

    public function aksi_po( Request $req ){
       //generate kode po
        $last_id_po=DB::table('purchase_order')->max('id_po');
        $last_id_po++;
        $no=10;
        $today=date('ymd');
        $po_number='PO'.'-'.$today.$no.sprintf("%04d",$last_id_po);

        //
       
     
        $id_barang=$req->input('id_barang');
        $id_suplier=$req->input('id_suplier');
        $jumlah_beli=$req->input('jumlah_beli');
        $total_harga=$req->input('total_harga');
      
        $barang=Barang::find($id_barang);
        $harga=$barang->harga;
        $total=$jumlah_beli*$harga;



        PurchaseOrder::create([
            'kode_po'=>$po_number,
            'id_barang'=>$id_barang,
            'id_suplier'=>$id_suplier,
            'total_beli'=>$jumlah_beli,
            'total_harga'=>$total
        
        ]);

        return redirect(route('purchase_order'))->with("success","Transaksi telah disimpan!");
    }

    public function result(Request $req){

        $last_id_po=DB::table('purchase_order')->max('id_po');
        
        $last_id_po++;
        $no=10;
        $today=date('ymd');
        $po_number='PO'.'-'.$today.$no.sprintf("%04d",$last_id_po);

        // $kode_po=$req->kode_po;
      
        $id_barang=$req->input('id_barang');
        $id_suplier=$req->input('id_suplier');
        $total_beli=$req->input('total_beli');
        
        $barang=Barang::find($id_barang);
        $nama_barang=$barang->nama_barang;
        $harga=$barang->harga;

        $suplier=Suplier::find($id_suplier);
        $nama_suplier=$suplier->nama_suplier;
        $alamat_suplier=$suplier->alamat_suplier;
        $email=$suplier->email;
        $no_hp=$suplier->no_hp;
        $no_rekening=$suplier->no_rekening;

        $total=$harga*$total_beli;

        return view('app.data_po.result_po')->with([
            'id_barang'=>$id_barang,
            'id_suplier'=>$id_suplier,
            'nama_barang'=>$nama_barang,
            'harga'=>$harga,
            'total_beli'=>$total_beli,
            'nama_suplier'=>$nama_suplier,
            'alamat'=>$alamat_suplier,
            'po_number'=>$po_number,
            'email'=>$email,
            'no_hp'=>$no_hp,
            'no_rekening'=>$no_rekening,
            'total'=>$total
        
        ]);
    }

    public function print($id){
        $data=PurchaseOrder::find($id);
        // $pdf = PDF::loadView('app.data_po.po_print', ['data'=>$data]);
        // return $pdf->stream() ;
        

        // return $pdf->stream();
        return view('app.data_po.po_print',['data'=>$data]);
    }

    public function view_detail($id){
            $po=PurchaseOrder::find($id);

            return view('app.data_po.view_detail',['po'=>$po]);

    }
    public function get_code_po(){
        $current_date=Carbon::now()->month;
        $harga=PurchaseOrder::select('kode_po')->whereMonth('created_at',$current_date)->orderBy('id_po','desc')->get();
        return response()->json($harga);
    }
    public function get_total_harga(Request $req){
        $harga=PurchaseOrder::select('total_harga')->where('kode_po',$req->kode_po)->first();
        return response()->json($harga);
    }


}
