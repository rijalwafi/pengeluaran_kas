<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PurchaseOrder extends Model
{
    protected $table='purchase_order';
    protected $primaryKey='id_po';
    protected $fillable=['kode_po','id_barang','id_suplier','total_beli','total_harga'];
    
    public function barang(){
        return $this->belongsTo('App\Barang','id_barang');
    }

    public function suplier (){
        return $this->belongsTo('App\Suplier','id_suplier');
    }
    public  function getTotalPrice() {
        return $this->barang->sum(function($buyDetail) {
          return $buyDetail->harga * $buyDetail->total_beli;
        });
      }
   
}