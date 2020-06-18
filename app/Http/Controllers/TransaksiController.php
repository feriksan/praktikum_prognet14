<?php

namespace App\Http\Controllers;

use DB;
use App\GambarProduk;
use App\Kategori;
use App\Notifications\respon_admin;
use App\Notifications\notif;
use App\transaksi;
use App\content;
use App\balasan;
use Auth;
use App\Notifications\ulasan_admin;
use App\ProdukDetail;
// use App\Quotation;
use App\Produk;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $index = transaksi::select('transactions.id','address','regency','province','shipping_cost','total','users.name','couriers.courier','proof_of_payment', 'transactions.status')
        ->orderBy('transactions.timeout', 'desc')
        ->join('users','users.id','=','transactions.user_id')
        ->join('couriers','couriers.id','=','transactions.courier_id')
        ->get();
        
        return view("admin.pembelian.lihat_transaksi",compact('index'));
    }

    public function hapus_pembelian(transaksi $transaksi )
    {
        $transaksi->delete();
        return redirect('admin/pembelian');
    }

    public function update_pembelian(transaksi $transaksi)
    {
        $test = transaksi::find($transaksi)->first();
        $id_transaksi = $test['id'];
        $values = transaksi::where('id', $id_transaksi)->update(['status'=>'verified']);
        $user = Auth::guard('user')->user();
        $user->notify(new respon_admin(transaksi::findOrFail($id_transaksi)));
        return redirect('admin/pembelian');
    }

    public function update_pembelian_delivered(transaksi $transaksi)
    {
        $test = transaksi::find($transaksi)->first();
        $id_transaksi = $test['id'];
        $values = transaksi::where('id', $id_transaksi)->update(['status'=>'delivered']);
        $user = Auth::guard('user')->user();
        $user->notify(new respon_admin(transaksi::findOrFail($id_transaksi)));
        return redirect('admin/pembelian');
    }

    public function update_pembelian_success(transaksi $transaksi)
    {
        $test = transaksi::find($transaksi)->first();
        $id_transaksi = $test['id'];
        $values = transaksi::where('id', $id_transaksi)->update(['status'=>'success']);
        $user = Auth::guard('user')->user();
        $user->notify(new respon_admin(transaksi::findOrFail($id_transaksi)));
        return redirect('admin/pembelian');
    }

    public function transaksi(Produk $produk)
    {
        $test = Produk::find($produk)->first();
        $img = GambarProduk::select('image_name')->where('product_id','=',$produk->id)->get();
        return view("user.transaksi.transaksi");
    }

    public function cart(Produk $produk)
    {
        $test = Produk::find($produk)->first();
        $img = GambarProduk::select('image_name')->where('product_id','=',$produk->id)->get();
        
        return view("user.transaksi.cart",compact('test', 'img'));
    }

    public function ulasan()
    {
        $content = content::select('product_reviews.id','content', 'rate', 'product_categories.category_name', 'users.name', 'product_reviews.created_at')
        ->join('product_category_details', 'product_category_details.product_id', '=', 'product_reviews.product_id')
        ->join('product_categories', 'product_categories.id', '=', 'product_category_details.product_id')
        ->join('users', 'users.id','=','product_reviews.user_id')
        ->get();
        return view("admin.pembelian.lihat_ulasan",compact('content'));
    }
    public function balas_ulasan(content $content, Request $request)
    {
        $ulasan = content::find($content)->first();
        $id = $ulasan['id'];
        $ulasan_baru = new balasan();
        $ulasan_baru->review_id = $id;
        $ulasan_baru->admin_id = 3;
        $ulasan_baru->content = $request->ulasan;
        $ulasan_baru->save();

        $id_balasan = balasan::latest('response.id')
        ->select('product_reviews.user_id', 'response.content')
        ->join('product_reviews', 'product_reviews.id', '=', 'response.review_id')
        ->first();
        // echo $id_balasan;
        $user = Auth::guard('user')->user();
        $user->notify(new ulasan_admin($id_balasan));
        
        return redirect('admin/ulasan');

    }
}
