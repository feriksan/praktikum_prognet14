<?php

namespace App\Http\Controllers;

use App\beli;
use DB;
use Cookie;
use App\GambarProduk;
use App\Kategori;
use App\cart;
use Auth;
use App\Notifications\transaksi_baru;
use App\Notifications\upload_bukti;
use App\Notifications\notif;
use App\ProdukDetail;
use App\transaksi;
use App\Kurir;
use App\alamat;
use App\kota;
use App\provinsi;
use App\detil_transaksi;
use App\review;
use App\preview;
use App\content;
use App\User;
use Carbon\Carbon;
use Validator;
// use App\Quotation;
use App\Produk;
use Illuminate\Http\Request;

class BeliController extends Controller
{
    private $value;
    private $values;
    private $kota;
    private $prov;
    private $cart;
    private $trans;
    protected $projects;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        // CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING => "",
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 30,
        // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => "POST",
        // CURLOPT_POSTFIELDS => "origin=501&destination=39&weight=1700&courier=jne",
        // CURLOPT_HTTPHEADER => array(
        //     "content-type: application/x-www-form-urlencoded",
        //     "key: 890279fa49d09fcc3d5682ed38f38720"
        // ),
        // ));

        // $response = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);

        // if ($err) {
        // echo "cURL Error #:" . $err;
        // } else {
        // //   echo $response;
        // }
        // $result = json_decode($response, true);
        // $_SESSION['result'] = $result;
        // foreach($_SESSION['result']['rajaongkir']['results'] as $key => $value){   
        //         foreach($value['costs'] as $keys => $values){ 
        //         }
        //     }

        // $this->value = $value;
        // $this->values = $values;

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => "",
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 30,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => "GET",
        //   CURLOPT_HTTPHEADER => array(
        //             "content-type: application/x-www-form-urlencoded",
        //             "key: 890279fa49d09fcc3d5682ed38f38720"
        //   ),
        // ));
        
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        
        // curl_close($curl);
        
        // if ($err) {
        //   echo "cURL Error #:" . $err;
        // } else {
        // }
        // $result = json_decode($response, true);
        // $_SESSION['result'] = $result;
        // $prov=array();
        // foreach($_SESSION['result']['rajaongkir']['results'] as $key => $provinsi){  
        //     array_push($prov,$provinsi['province']);
        // }
        // $this->prov = $prov;

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => "",
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 30,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => "GET",
        //   CURLOPT_HTTPHEADER => array(
        //             "content-type: application/x-www-form-urlencoded",
        //             "key: 890279fa49d09fcc3d5682ed38f38720"
        //   ),
        // ));
        
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        
        // curl_close($curl);
        
        // if ($err) {
        //   echo "cURL Error #:" . $err;
        // } else {

        // }
        // $result = json_decode($response, true);
        // $_SESSION['result'] = $result;
        // $kota=array();
        // foreach($_SESSION['result']['rajaongkir']['results'] as $key => $provinsi){  
        //     array_push($kota,$provinsi['city_name']);
        // }
        // $user = Auth::guard('user')->user();
        // print_r($user);
        // echo $user['id'];
        $cart = cart::select('carts.id','products.product_name','products.discount','products.price','products.stock','product_images.image_name','product_categories.category_name', 'qty')
        ->selectRaw('products.price*qty as sub')
        ->join('products','carts.product_id','=','products.id')
        ->join('product_category_details','products.id','=','product_category_details.product_id')
        ->join('product_images','products.id','=','product_images.product_id')
        ->join('product_categories','product_category_details.category_id','=','product_categories.id')
        ->where('status', '=', 'notyet')
        // ->where('user_id', '=', $user['id'])
        ->get();

        // $trans = transaksi::select('transactions.id','timeout','address','regency','total','shipping_cost','couriers.courier','proof_of_payment', 'status')
        // ->join('couriers','couriers.id','=','transactions.courier_id')
        // ->get();
        
        // $this->middleware(function ($request, $next) {
        //     $this->projects = Auth::guard('user')->user()->projects;
        //     return $next($request);
        // });
        // $user = Auth::guard('user')->user();
        $index = transaksi::select('transactions.id','timeout','address','regency','total','shipping_cost','couriers.courier','proof_of_payment', 'status')
        ->join('couriers','couriers.id','=','transactions.courier_id')
        // ->where('user_id', '=', $user['id'])
        ->get();

        $timeout = transaksi::select('timeout', 'id')
        ->get();
        $tanggal_sekarang = Carbon::now();
        foreach($timeout as $key => $value){
            if($value['timeout'] < $tanggal_sekarang){
                $update = transaksi::where('id', $value['id'])->update(['status'=>'expired']);
            }
        }
        // $this->cart = $cart;
        // $this->trans = $trans;
        // $this->kota = $kota;
    }

    public function ambil_alamat()
    {
        $kot = $this->kota;
        $provinsi = $this->prov;

        return view("user.preference.profile",compact('kot', 'provinsi'));
    }

    public function save_alamat(Request $request)
    {
        $alamat = new alamat();
        $alamat->user_id = 1;
        $alamat->provinsi = $request->provinsi;
        $alamat->kota = $request->kota;
        $alamat->nama_jalan = $request->nama_jalan;
        $alamat->save();
        return redirect('/user/beli');
    }

    public function tambah_alamat(Request $request)
    {
        $alamat = new alamat();
        $alamat->user_id = 1;
        $alamat->provinsi = $request->provinsi;
        $alamat->kota = $request->kota;
        $alamat->nama_jalan = $request->nama_jalan;
        $alamat->save();
        return redirect('/user/checkout');
    }

    public function index()
    {
        $index = Produk::select('products.id','products.product_name','discount','products.price','description','product_rate','stock','product_images.image_name', 'product_reviews.rate')
        // ->orderBy('products.id', 'desc')
        ->join('product_reviews', 'products.id', '=', 'product_reviews.product_id')
        ->groupBy('products.id')
        ->whereNull('product_reviews.deleted_at')
        ->selectRaw('SUM(product_reviews.rate)/COUNT(product_reviews.product_id) as rate')
        ->join('product_images','products.id','=','product_images.product_id')
        ->get();

        $product_review = review::select('product_reviews.product_id', 'product_reviews.rate')
        ->join('products', 'products.id', '=', 'product_reviews.product_id')
        ->groupBy('products.id')
        ->selectRaw('SUM(rate)/COUNT(product_id) as rate')
        ->get();
        // foreach ($index as $key => $id){
        //     $get_rate = review::where('product_id', $id->id)
        //     ->selectRaw('SUM(rate)/COUNT(product_id) as rate')
        //     ->pluck('rate');
        //     // $get_rate = review::where('product_id', $id->id)->avg('rate');
        //     // $rate = (int)$get_rate;
        //     // array_push($product_review, $rate);
        // }
        $cart = $this->cart;
        $trans = $this->trans;

        return view("user.transaksi.index",compact('index', 'cart', 'trans', 'product_review'));
    }

    public function checkout(Request $request, beli $beli)
    {
        $user_id = Auth::guard('user')->user();
        
        $user = User::select('name', 'email')
        ->where('users.id', $user_id['id'])
        ->take(1)
        ->get();
        $qty = $request->all();
        if($qty != null){
            $i = 0;
        foreach($qty['id'] as $key => $id){
            // echo $id;
            $values = cart::where('id', $id)->update(['qty'=>$qty['banyak'][$i]]);
            $i++;
        }
        }
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded",
                    "key: 890279fa49d09fcc3d5682ed38f38720"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
        }
        $result = json_decode($response, true);
        $_SESSION['result'] = $result;
        $prov=array();
        foreach($_SESSION['result']['rajaongkir']['results'] as $key => $provinsi){  
            array_push($prov,$provinsi['province']);
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded",
                    "key: 890279fa49d09fcc3d5682ed38f38720"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {

        }
        $result = json_decode($response, true);
        $_SESSION['result'] = $result;
        $kota=array();
        foreach($_SESSION['result']['rajaongkir']['results'] as $key => $provinsi){  
            array_push($kota,$provinsi['city_name']);
        }
        $kot = $kota;
        $provinsi = $prov;
        return view("user.transaksi.checkout", compact('user', 'kot', 'provinsi'));
    }
    public function checkout2(Request $request, beli $beli)
    {
        $alamat = $request->nama_jalan;
        $provinsi = $request->provinsi;
        $region = $request->kota;

        $kurir = Kurir::select('courier', 'id')->get();

        Cookie::queue('provinsi', $provinsi);
        Cookie::queue('kota', $region);
        Cookie::queue('nama_jalan', $alamat);

        return view("user.transaksi.checkout2", compact('kurir'));
    }
    public function checkout3(Request $request, beli $beli)
    {
        $kota = $request->cookie('kota');
        $provinsi = $request->cookie('provinsi');
        $nama_jalan = $request->cookie('nama_jalan');

        $kurir = $request->kurir;
        Cookie::queue('kurir', $kurir);

        if($kurir == 1){
            $courier = "jne";
        }elseif($kurir == 2){
            $courier = "tiki";
        }elseif($kurir == 4){
            $courier = "pos";
        }
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=501&destination=$kota&weight=1700&courier=$courier",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 890279fa49d09fcc3d5682ed38f38720"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        }
        // return $response;
        $result = json_decode($response, true);
        $_SESSION['result'] = $result;
        foreach($_SESSION['result']['rajaongkir']['results'] as $key => $value){   
                foreach($value['costs'] as $keys => $values){ 
                }
            }
        $nama_kurir = $value['name'];
        $ongkir = $values['cost'][0]['value'];
        $durasi = $values['cost'][0]['etd'];
        $paket = $value['costs'][0]['service'];

        $index = cart::select('carts.id','products.product_name', 'carts.product_id','products.discount','products.price','products.stock','product_images.image_name','product_categories.category_name', 'qty')
        ->selectRaw('products.discount*qty as sub')
        ->join('products','carts.product_id','=','products.id')
        ->join('product_category_details','products.id','=','product_category_details.product_id')
        ->join('product_images','products.id','=','product_images.product_id')
        ->join('product_categories','product_category_details.category_id','=','product_categories.id')
        ->where('status', '=', 'notyet')
        ->get();

        $city = kota::select('city_name')->where('id','=', $kota)->first();
        $pp = provinsi::select('province')->where('id','=', $provinsi)->first();
        $user_id = Auth::guard('user')->user();
        $user = User::select('name', 'email')
        ->where('users.id', '=', $user_id['id'])
        ->take(1)
        ->get();
        return view("user.transaksi.checkout3", compact('index', 'ongkir', 'nama_kurir', 'durasi', 'paket', 'user', 'city', 'pp', 'nama_jalan'));
    }

    public function check(Request $request)
    {
        $kota = $request->cookie('kota');
        $provinsi = $request->cookie('provinsi');
        $nama_jalan = $request->cookie('nama_jalan');
        $kurir = $request->cookie('kurir');

        $user = Auth::guard('user')->user();

        $data = array();
        $qty = $request->qty;
        $id = $request->id;
        $price = $request->price;
        $discount = $request->discount;
        $count = $request->count;
        $data[] = array("id" => $id, "qty" => $qty, "price" => $price, "discount" => $discount);
        $city = kota::select('city_name')->where('id','=', $kota)->first();
        $pp = provinsi::select('province')->where('id','=', $provinsi)->first();
        $values = cart::where('user_id', $user['id'])->update(['status'=>'checkedout']);
        $start = Carbon::now();
        $new_date = $start->addDays(1);
        $transaksi = new transaksi();
        $transaksi->timeout = $new_date;
        $transaksi->address = $nama_jalan;
        $transaksi->regency = $city['city_name'];
        $transaksi->province = $pp['province'];
        $transaksi->total = $request->total;
        $transaksi->shipping_cost = $request->ongkir;
        $transaksi->sub_total = $request->subtotal;
        $transaksi->user_id = $user['id'];
        $transaksi->courier_id = $kurir;
        $transaksi->status = "unverified";
        $transaksi->save();

        $id_trans = transaksi::latest('id')->first();
        $qty = $request->all();
        $i = 0;
        $id_balasan = transaksi::latest('transactions.id')
        ->select('user_id', 'total', 'users.name', 'address')
        ->join('users', 'users.id', '=', 'transactions.user_id')
        ->first();
        $user = Auth::guard('admin')->user();
        $user->notify(new transaksi_baru($id_balasan));
        foreach($data as $key => $data){
            while($i < $count){
                $detil_transaksi = new detil_transaksi();
                $detil_transaksi->transaction_id = $id_trans['id'];
                $detil_transaksi->product_id = $data['id'][$i];
                $detil_transaksi->selling_price = $data['price'][$i];
                $detil_transaksi->discount = $data['discount'][$i];
                $detil_transaksi->qty = $data['qty'][$i];
                $detil_transaksi->save();
                $i++;
            }
        }
        if($values){
            return redirect('/user/beli');
        }else{
            return "telah terjadi error";
        }

    }
    public function lihatbelanjaan(){
        $user = Auth::guard('user')->user();
        $index = transaksi::select('transactions.id','timeout','address','regency','total','shipping_cost','couriers.courier','proof_of_payment', 'status')
        ->join('couriers','couriers.id','=','transactions.courier_id')
        ->orderBy('transactions.created_at', 'desc')
        ->where('user_id', '=', $user['id'])
        ->get();
        $check_review = review::select('product_id', 'user_id')->get();
        $timeout = transaksi::select('timeout', 'id')
        ->get();
        $tanggal_sekarang = Carbon::now();
        foreach($timeout as $key => $value){
            if($value['timeout'] < $tanggal_sekarang){
                $update = transaksi::where('id', $value['id'])->update(['status'=>'expired']);
            }
        }
        $cart = $this->cart;
        $trans = $this->trans;
        return view('user.transaksi.lihat', compact('index', 'timeout', 'cart', 'trans', 'check_review'));
    }

    public function cancelbelanjaan(transaksi $transaksi, Request $request)
    {
        $test = transaksi::find($transaksi)->first();
        $id_transaksi = $test['id'];
        $values = transaksi::where('id', $id_transaksi)->update(['status'=>'canceled']);
        if($values){
            return redirect('user/lihatbelanjaan');    
        }else{
            return "Terjadi Kesalahan";
        }
        
    }
    public function calcelcart(cart $cart, Request $request)
    {
        $cart->status = 'cancelled';
        $cart->save();
        if($cart){
            return redirect('/user/beli');
        }else{
            return "telah terjadi error";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addcart(beli $beli, Request $request)
    {
        $user = Auth::guard('user')->user();
        if($request->jumlah == null){
            $test = beli::find($beli)->first();
            $cart = new cart();
            $cart->user_id = $user['id'];
            $cart->product_id = $test['id'];
            $cart->qty = 1;
            $cart->status = 'notyet';
            $cart->save();
            return redirect('/user/checkout');
        }else{
            $test = beli::find($beli)->first();
            $cart = new cart();
            $cart->user_id = $user['id'];
            $cart->product_id = $test['id'];
            $cart->qty = $request->jumlah;
            $cart->status = 'notyet';
            $cart->save();
        }
        return redirect('/user/beli');
    }

    public function deletecart(cart $cart, Request $request)
    {
        $user = Auth::guard('user')->user();

        $cart->delete();
        return redirect('/user/lihatcart');
    }

    public function lihatcart()
    {
        $user = Auth::guard('user')->user();

        $index = cart::select('carts.id','products.product_name' ,'user_id' ,'products.discount','products.price','products.stock','product_images.image_name','product_categories.category_name', 'qty', 'status')
        ->selectRaw('products.price*qty as sub')
        ->join('products','carts.product_id','=','products.id')
        ->join('product_category_details','products.id','=','product_category_details.product_id')
        ->join('product_images','products.id','=','product_images.product_id')
        ->join('product_categories','product_category_details.category_id','=','product_categories.id')
        ->where('user_id', '=', $user['id'])
        ->get();
        $id = 3;
        $cart = $this->cart;
        $trans = $this->trans;
        return view('user.transaksi.cart', compact('index', 'id', 'cart', 'trans'));
    }
    public function tambah_ke_cart(preview $preview)
    {
        $user = Auth::guard('user')->user();

        $test = preview::find($preview)->first();
        $img = GambarProduk::select('image_name')->where('product_id','=',$preview->id)->get();
        $content = content::select('content', 'rate', 'product_categories.category_name', 'users.name', 'product_reviews.created_at')
        ->join('product_category_details', 'product_category_details.product_id', '=', 'product_reviews.product_id')
        ->join('product_categories', 'product_categories.id', '=', 'product_category_details.product_id')
        ->join('users', 'users.id','=','product_reviews.user_id')
        ->where('product_reviews.product_id','=',$preview->id)
        ->get();
        $cart = $this->cart;
        $trans = $this->trans;
        return view("user.transaksi.transaksi",compact('test', 'img', 'content', 'cart', 'trans'));
    }

    public function upload_bukti_bayar(transaksi $transaksi, Request $request){
        $user = Auth::guard('user')->user();
        
        $validator = Validator::make(request()->all(),[
            'file' => 'required|max:700'
             ]);
        $file = $request->file('bukti');
        $nama_file = $file;
        $tujuan = 'bukti_pembayaran\\';
        $disimpan = $file->getClientOriginalName();
        $file->move($tujuan,$file->getClientOriginalName());

        $test = transaksi::find($transaksi)->first();
        $id_transaksi = $test['id'];
        $values = transaksi::where('id', $id_transaksi)->update(['proof_of_payment'=>$disimpan]);

        $id_balasan = transaksi::select('transactions.id', 'users.name')
        ->join('users', 'users.id', '=', 'transactions.user_id')
        ->where('transactions.id', '=', $id_transaksi)
        ->first();
        $user = Auth::guard('admin')->user();
        $user->notify(new upload_bukti($id_balasan));
        return redirect('user/lihatbelanjaan');
    }

    public function post_review(transaksi $transaksi, Request $request)
    {
        $user = Auth::guard('user')->user();
        $test = transaksi::find($transaksi)->first();
        $id_transaksi = $test['id'];
        $id = detil_transaksi::select('product_id')->where('transaction_id', $id_transaksi)->first();

        $cek_user = review::select('product_id', 'user_id')
        ->where('product_id', $id['product_id'])
        ->get();
        foreach($cek_user as $key => $id){
            if($id['user_id'] == $user['id']){
                return redirect('user/lihatbelanjaan')->with('error', 'ANDA SUDAH KOMEN');
            }
        }
        $cart = new review();
        $cart->user_id = $user['id'];
        $cart->product_id = $id['product_id'];
        $cart->rate = $request->rate;
        $cart->content = $request->content;
        $cart->save();

        $id_balasan = review::latest('product_reviews.id')
        ->select('user_id', 'product_id', 'rate', 'users.name', 'products.product_name', 'content')
        ->join('users', 'users.id', '=', 'product_reviews.user_id')
        ->join('products', 'products.id', '=', 'product_reviews.product_id')
        ->first();
        $user = Auth::guard('admin')->user();
        $user->notify(new notif($id_balasan));

        return redirect('user/lihatbelanjaan');
    }

    public function create(beli $beli, Request $request)
    {
        
        return view("user.transaksi.checkout");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(beli $beli)
    {
        $test = beli::find($beli)->first();
        $cart = new cart();
        $cart->user_id = 1;
        $cart->product_id = 1;
        $cart->qty = $request->jumlah;

        $cart->save();
        return view("user.transaksi.checkout");
    }

    public function oke(){
        $barang = $this->value;
        $abi = $this->values;
        $nama_kurir = $barang['name'];
        $ongkir = $abi['cost'][0]['value'];
        $mitra = $barang['costs'][0]['service'];
        $durasi = $abi['cost'][0]['etd'];
        
        $paket = $mitra;
        $shipping = $ongkir;
        $estimasi = $durasi;
        return response()->json(array('paket'=> $paket, 'shipping'=>$shipping, 'estimasi'=>$estimasi), 200);
    }

    public function reg(){
        $barang = $this->value;
        $abi = $this->values;
        $nama_kurir = $barang['name'];
        $ongkir = $abi['cost'][1]['value'];
        $mitra = $barang['costs'][1]['service'];
        $durasi = $abi['cost'][0]['etd'];
        
        $paket = $mitra;
        $shipping = $ongkir;
        $estimasi = $durasi;
        return response()->json(array('paket'=> $paket, 'shipping'=>$shipping, 'estimasi'=>$estimasi), 200);
    }

    public function sps(){
        $barang = $this->value;
        $abi = $this->values;
        $nama_kurir = $barang['name'];
        $ongkir = $abi['cost'][2]['value'];
        $mitra = $barang['costs'][2]['service'];
        $durasi = $abi['cost'][2]['etd'];
        
        $paket = $mitra;
        $shipping = $ongkir;
        $estimasi = $durasi;
        return response()->json(array('paket'=> $paket, 'shipping'=>$shipping, 'estimasi'=>$estimasi), 200);
    }

    public function yes(){
        $barang = $this->value;
        $abi = $this->values;
        $nama_kurir = $barang['name'];
        $ongkir = $abi['cost'][3]['value'];
        $mitra = $barang['costs'][3]['service'];
        $durasi = $abi['cost'][0]['etd'];
        
        $paket = $mitra;
        $shipping = $ongkir;
        $estimasi = $durasi;
        return response()->json(array('paket'=> $paket, 'shipping'=>$shipping, 'estimasi'=>$estimasi), 200);
    }

    public function lihat_alamat()
    {
        $alamat = alamat::select('nama_jalan', 'provinsi', 'kota', 'status')
        ->where('user_id', '=', '1')
        ->get();

        foreach ($alamat as $alm)
        {
            $id = $alm->provinsi;
            $ad = $alm->kota;

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=".$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                        "content-type: application/x-www-form-urlencoded",
                        "key: 65fc259e0d6e4cf18d7eb5582dd667b8"
            ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
                
            }
            $result = json_decode($response, true);

            $provinsi[] = array(
                'nama_provinsi' => $result['rajaongkir']['results']['province']
            );

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=&province=".$id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                            "content-type: application/x-www-form-urlencoded",
                            "key: 65fc259e0d6e4cf18d7eb5582dd667b8"
                ),
                ));
                
                $response = curl_exec($curl);
                $err = curl_error($curl);
                
                curl_close($curl);
                
                if ($err) {
                echo "cURL Error #:" . $err;
                } else {
                    
                }
                $result = json_decode($response, true);
    
                $provinsi[] = array(
                    'nama_provinsi' => $result['rajaongkir']['results']['province']
                );
        }

        return view('user.preference.tambah_alamat', compact('alamat', 'provinsi'));
    }

    public function getCityAjax($id){
        $cities = kota::where('province_id',$id)->pluck('city_name','id');
        // dd($cities);
        return json_encode($cities);
    }
    
    public function test()
    {
        return view('user.transaksi.test');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\beli  $beli
     * @return \Illuminate\Http\Response
     */
    public function show(beli $beli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\beli  $beli
     * @return \Illuminate\Http\Response
     */
    public function edit(beli $beli,Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\beli  $beli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, beli $beli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\beli  $beli
     * @return \Illuminate\Http\Response
     */
    public function destroy(beli $beli, cart $cart)
    {
        // 
    }
}
