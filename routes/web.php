<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('auth.login');
});

Auth::routes([
	'register' => false, // disable register
  	'reset' => false, // disable reset password
  	'verify' => false, // disable verifikasi email saat pendaftaran
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/kategori', 'HomeController@kategori')->name('kategori');
Route::post('/kategori/aksi', 'HomeController@kategori_aksi')->name('kategori.aksi');
Route::put('/kategori/update/{id}', 'HomeController@kategori_update')->name('kategori.update');
Route::delete('/kategori/delete/{id}', 'HomeController@kategori_delete')->name('kategori.delete');

Route::get('/password', 'HomeController@password')->name('password');
Route::post('/password/update', 'HomeController@password_update')->name('password.update');

Route::get('/transaksi', 'HomeController@transaksi')->name('transaksi');
Route::post('/transaksi/aksi', 'HomeController@transaksi_aksi')->name('transaksi.aksi');
Route::put('/transaksi/update/{id}', 'HomeController@transaksi_update')->name('transaksi.update');
Route::delete('/transaksi/delete/{id}', 'HomeController@transaksi_delete')->name('transaksi.delete');
Route::get('/transaksi/detail/{id}','HomeController@transaksi_detail')->name('transaksi.detail');


Route::get('/pengguna', 'HomeController@user')->name('user');
Route::get('/pengguna/tambah', 'HomeController@user_add')->name('user.tambah');
Route::post('/pengguna/aksi', 'HomeController@user_aksi')->name('user.aksi');
Route::get('/pengguna/edit/{id}', 'HomeController@user_edit')->name('user.edit');
Route::put('/pengguna/update/{id}', 'HomeController@user_update')->name('user.update');
Route::delete('/user/delete/{id}', 'HomeController@user_delete')->name('user.delete');


Route::get('/laporan', 'HomeController@laporan')->name('laporan');
Route::get('/laporan/excel', 'HomeController@laporan_excel')->name('laporan_excel');
Route::get('/laporan/print', 'HomeController@laporan_print')->name('laporan_print');

Route::get('/suplier', 'SuplierController@index')->name('suplier');
Route::post('/suplier/add', 'SuplierController@suplier_add')->name('suplier.add');
Route::put('/suplier/update/{id}','SuplierController@suplier_update')->name('suplier.update');
Route::delete('/suplier/delete/{id}','SuplierController@suplier_delete')->name('suplier.delete');

Route::get('/barang','BarangController@index')->name('barang');
Route::post('/barang/add','BarangController@add_barang')->name('barang.add');
Route::put('/barang/update/{id}','BarangController@update_barang')->name('barang.update');
Route::delete('/barang/delete/{id}','BarangController@delete_barang')->name('barang.delete');
Route::get('/nama_barang','BarangController@nama_barang');

Route::get('/purchase_order','PurchaseOrderController@index')->name('purchase_order');
Route::get('purchase_order/add','PurchaseOrderController@add_po')->name('purchase_order.add');
Route::post('/purchase_order/result','PurchaseOrderController@result')->name('purchase_order.result');
Route::get('/purchase_order/view_detail/{id}','PurchaseOrderController@view_detail')->name('purchase_order.view_detail');
Route::post('/purchase_order/add_aksi','PurchaseOrderController@aksi_po')->name('purchase_order.add_aksi');
Route::put('purchase_order/update/{id}','PurchaseOrderController@update_po')->name('purchase_order.update');
Route::delete('purchase_order/delete/{id}','PurchaseOrderController@delete_po')->name('purchase_order.delete');
Route::get('/purchase_order/print/{id}','PurchaseOrderController@print')->name('purchase_order.print');

Route::get('/get_code_po','PurchaseOrderController@get_code_po');
Route::get('/get_total_harga','PurchaseOrderController@get_total_harga');
