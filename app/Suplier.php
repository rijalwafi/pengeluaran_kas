<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $primaryKey='id_suplier';
    protected $fillable=['nama_suplier','alamat_suplier','email','no_hp','no_rekening'];

    public function purchase_order(){
        return $this->hasOne('App\PurchaseOrder');
    }
}