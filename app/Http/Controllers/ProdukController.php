<?php

namespace App\Http\Controllers;

use DB;
use App\GambarProduk;
use App\Kategori;
use App\ProdukDetail;
// use App\Quotation;
use App\Produk;
use App\Product_image;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminLogin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Produk::select('products.id','products.product_name','discount','products.price','description','product_rate','stock','product_categories.category_name')
        ->join('product_category_details','products.id','=','product_category_details.product_id')
        ->join('product_categories','product_category_details.category_id','=','product_categories.id')
        ->get();
        
        
        return view("admin.produk.index",compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::get();
        return view("/admin/produk/create",compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Produk;
        $product->product_name= $request->nama_produk;
        $product->discount= $request->pot_harga;
        $product->price= $request->harga;
        $product->description= $request->deskripsi;
        $product->product_rate= $request->rating;
        $product->stock= $request->stok;
        $product->save();
        
        if(is_array($request->kategori)){
            foreach($request->kategori as $kat){
                $cat = new ProdukDetail;
                $cat->product_id = $product->id;
                $cat->category_id = $kat;
                $cat->save();
            }
        }
        
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);      

        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $index[] = $name;
                $form= new GambarProduk();   
                $form->product_id = $product->id;
                $form->image_name=$name;  
                $form->save();       
            }
        }
        return redirect('/admin/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $test = Produk::find($produk)->first();
        $imga = GambarProduk::where('product_id','=',$produk->id)->get();
        $img = GambarProduk::select('image_name')->where('product_id','=',$produk->id)->get();
        return view("/admin/produk/edit",compact("test","img","imga"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $produk->product_name= $request->nama_produk;
        $produk->discount= $request->pot_harga;
        $produk->price= $request->harga;
        $produk->description= $request->deskripsi;
        $produk->product_rate= $request->rating;
        $produk->stock= $request->stok;
        $produk->save();
        return redirect('/admin/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy2($id)
    {
        // Product_image::where('id', $id)->delete();
        // return redirect()->back(); 
    }

    public function destroy(Produk $produk)
    {
        Produk::where('id','=',$produk->id)->delete();
        return redirect('/admin/produk/')->with('message','Data Berhasil Dihapus');
    }
}

