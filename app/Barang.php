<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $primaryKey='id_barang';
    protected $fillable=['nama_barang','stok','harga'];

    public function purchaseorder(){
        return $this->hasOne('App\PurchaseOrder');
    }
}
  