<?php

use App\Notifications\notif;
use App\transaksi;
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

Route::get('/', function() {
    return view('welcome');
});

//USER
Route::prefix('user')->group(function(){
Route::get('/register','userController@userRegister');
Route::get('/preference','userController@atur_alamat');
Route::post('/register','userController@registerSubmit', ['verify'=> True]);
Route::get('/verify/{id}','userController@verifyEmailUser');
Route::get('/login','userController@userLogin');
Route::post('/login','userController@loginSubmit');
Route::get('/logout','userController@logout');
Route::resource('/beli','BeliController')->middleware('userLogin');
Route::resource('/preview','PreviewController')->middleware('userLogin');
Route::get('/addcart{beli}','BeliController@addcart');
Route::get('/review{transaksi}','BeliController@post_review');
Route::post('/upload_bukti{transaksi}','BeliController@upload_bukti_bayar');
Route::get('/lihatcart','BeliController@lihatcart')->middleware('userLogin');
Route::get('/check','BeliController@check')->middleware('userLogin');
Route::get('/getoke','BeliController@oke');
Route::get('/alamat','BeliController@ambil_alamat');
Route::get('/getreg','BeliController@reg');
Route::get('/test','BeliController@test');
Route::get('/getsps','BeliController@sps');
Route::get('/getyes','BeliController@yes');
Route::get('/save_alamat','BeliController@save_alamat');
Route::get('/tambah_alamat','BeliController@tambah_alamat');
Route::get('/lihatbelanjaan','BeliController@lihatbelanjaan');
Route::get('/delete/{cart}','BeliController@deletecart');
Route::get('/cancel/{cart}','BeliController@calcelcart');
Route::get('/cancelbelanjaan/{transaksi}','BeliController@cancelbelanjaan');
Route::get('/transaksi/{transaksi}','TransaksiController@transaksi');
Route::get('/checkout','BeliController@checkout');
Route::get('/checkout2','BeliController@checkout2');
Route::get('/checkout3','BeliController@checkout3');
Route::get('/lihatalamat','BeliController@lihat_alamat');
Route::get('/lihat{preview}','BeliController@tambah_ke_cart');
Route::get('/markRead', function(){
    foreach(Auth::guard('user')->user()->unreadNotifications as $notif){
        $notif->markAsRead();
    }
    return Redirect::back();
});
    //middleware
    Route::get('/dashboard','userController@dashboard')->middleware('userLogin');
});

Route::get('/getCity/ajax/{id}','BeliController@getCityAjax');


//ADMIN
Route::group(['prefix'=>'admin', 'guard'=>'admin'],function(){
Route::get('/login','adminController@adminLogin');
Route::post('/login','adminController@loginSubmit');
Route::get('/register','adminController@adminRegister');
Route::post('/register','adminController@registerSubmit');
Route::get('/logout','adminController@logout');
Route::get('/hapus_pembelian{transaksi}','TransaksiController@hapus_pembelian');
Route::get('/update_status{transaksi}','TransaksiController@update_pembelian');
Route::get('/delivered{transaksi}','TransaksiController@update_pembelian_delivered');
Route::get('/success{transaksi}','TransaksiController@update_pembelian_success');
Route::get('/balas{content}','TransaksiController@balas_ulasan');
Route::get('/ulasan','TransaksiController@ulasan');
Route::resource('/kategori','KategoriController');
Route::resource('/kurir','KurirController');
Route::resource('/produk','ProdukController');
Route::resource('/pembelian','TransaksiController');
Route::resource('product_images','ProdukController');

Route::get('/markRead', function(){
    foreach(Auth::guard('admin')->user()->unreadNotifications as $notif){
        $notif->markAsRead();
    }
    return Redirect::back();;
});

    Route::get('/dashboard','adminController@dashboard')->middleware('adminLogin');

});