<?php

namespace App\Http\Controllers;

use App\preview;
use DB;
use App\GambarProduk;
use App\Kategori;
use App\ProdukDetail;
// use App\Quotation;
use App\Produk;
use App\content;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\preview  $preview
     * @return \Illuminate\Http\Response
     */
    public function show(preview $preview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\preview  $preview
     * @return \Illuminate\Http\Response
     */
    public function edit(preview $preview)
    {
        $test = preview::find($preview)->first();
        $img = GambarProduk::select('image_name')->where('product_id','=',$preview->id)->get();
        $content = content::select('content', 'rate', 'product_categories.category_name', 'users.name')
        ->join('product_category_details', 'product_category_details.product_id', '=', 'product_reviews.product_id')
        ->join('product_categories', 'product_categories.id', '=', 'product_category_details.product_id')
        ->join('users', 'users.id','=','product_reviews.user_id')
        ->where('product_reviews.product_id','=',$preview->id)
        ->get();
        return view("user.transaksi.transaksi",compact('test', 'img', 'content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\preview  $preview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, preview $preview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\preview  $preview
     * @return \Illuminate\Http\Response
     */
    public function destroy(preview $preview)
    {
        //
    }
}
