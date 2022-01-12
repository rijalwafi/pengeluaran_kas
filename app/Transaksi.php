<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	protected $table = "transaksi";

	protected $fillable = ["tanggal","jenis","kategori_id","nominal","keterangan",'kode_po','bukti_invoice','bukti_transfer'];

	public function kategori()
	{
		return $this->belongsTo('App\Kategori');
	}
}
