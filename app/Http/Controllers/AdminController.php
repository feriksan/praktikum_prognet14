<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\detil_transaksi;
use App\transaksi;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\AUTH;
use Illuminate\Support\Facades\AuthenticatesUsers;

class adminController extends Controller
{
    public function construct_(){
        
    }
    public function adminLogin(){
        return view('admin/loginAdmin');
    }

    public function adminRegister(){
        return view('admin/registerAdmin');
    }

    public function loginSubmit(Request $request){
        $data = $request->only('username','password');
        if(Auth::guard('admin')->attempt($data)){
            return redirect('/admin/dashboard')->with('success');;
            }else{
                return redirect('admin/login')->with('error', 'Username atau Password Salah!');
        }
    }

    public function registerSubmit(Request $request){

        $validator = Validator::make(request()->all(),['phone' => 'required|unique:admins,phone']);
        
        $v = Validator::make(request()->all(),['username' => 'required|min:4|max:30|unique:admins,username']);

        $valid = Validator::make(request()->all(),[
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8']);

            if ($validator->fails()) {
                return redirect('admin/register')->with('error','Nomor Telepon Sudah Digunakan!');

            }elseif ($v->fails()) {
                return redirect('admin/register')->with('error','Username Sudah Digunakan!');

            }elseif ($valid->fails()) {
                return redirect('admin/register')->with('error','Password Tidak Sesuai!');
            }
             else {
 
        $file = $request->file('file');
        $tujuan = 'fotoadmin\\';
        $disimpan = $tujuan.$file;
        $file->move($tujuan,$file->getClientOriginalName());

        $new = new Admin;
        $new->name = $request->name;
        $new->username = $request->username;
        $new->phone = $request->phone;
        $new->password = Hash::make($request->password);
        $new->profile_image = $disimpan;
        $new->save();

        return redirect ('admin/login')->with('success','Registrasi Berhasil, Silakan Login');
         }
    }

    public function dashboard(){
        // $transaksi = transaksi::whereMonth('created_at', '=', date('M'))->whereYear('created_at', '=', date('Y'))->get();
        //     $status = ['unverified' => 0,'expired' => 0, 'cancelled' => 0, 'verified' => 0, 'success' => 0, 'harga' => 0, 'total' => $transaksi->count()];
        //     $status['unverified'] = $this->findCountStatus('unverified',1);
        //     $status['expired'] = $this->findCountStatus('expired',1);
        //     $status['cancelled'] = $this->findCountStatus('cancelled',1);
        //     $status['verified'] = $this->findCountStatus('verified',1);
        //     $status['success'] = $this->findCountStatus('success',1);
        // foreach($transaksi as $item){
        //     if($item->status == 'verified' || $item->status == 'success'){
        //         $status['harga'] = $status['harga'] + $item->total;
        //     }
        // }
        $transaksi_tahun = transaksi::whereYear('created_at','=', date('Y'))->get();
            $status_tahun = ['unverified' => 0,'expired' => 0, 'canceled' => 0, 'verified' => 0, 'success' => 0, 'harga' => 0, 'total' => $transaksi_tahun->count()];
            $status_tahun['unverified'] = $this->findCountStatus('unverified',2);
            $status_tahun['expired'] = $this->findCountStatus('expired',2);
            $status_tahun['cancelled'] = $this->findCountStatus('canceled',2);
            $status_tahun['verified'] = $this->findCountStatus('verified',2);
            $status_tahun['success'] = $this->findCountStatus('success',2);
        foreach($transaksi_tahun as $item_y){
            if($item_y->status == 'verified' || $item_y->status == 'success'){
                $status_tahun['harga'] = $status_tahun['harga'] + $item_y->total;
            }
        }

        $transaksi_bulan = transaksi::whereYear('created_at','=', date('Y'))->whereMonth('created_at', '=', date('m'))->get();
            $status_bulan = ['unverified' => 0,'expired' => 0, 'canceled' => 0, 'verified' => 0, 'success' => 0, 'harga' => 0, 'total' => $transaksi_bulan->count()];
            $status_bulan['unverified'] = $this->findCountStatus('unverified',1);
            $status_bulan['expired'] = $this->findCountStatus('expired',1);
            $status_bulan['cancelled'] = $this->findCountStatus('canceled',1);
            $status_bulan['verified'] = $this->findCountStatus('verified',1);
            $status_bulan['success'] = $this->findCountStatus('success',1);
        
        foreach($transaksi_bulan as $item_b){
            if($item_b->status == 'verified' || $item_b->status == 'success'){
                $status_bulan['harga'] = $status_bulan['harga'] + $item_b->total;
            }
        }
        $i = 0;
        $b = 0;
        $transaksi_total = [];
        $transaksi_penjualan_gagal = [];
        $pendapatan = [];
        $nama_bulan = ['January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'Movember', 'December'];
        foreach ($nama_bulan as $key => $bulannnn) {
            $transaksi_semua = transaksi::whereMonth('created_at', '=', date('m', strtotime($nama_bulan[$i])))->where('status', '=', 'success')->count();
            array_push($transaksi_total, $transaksi_semua);
            $i++;
        }
        foreach ($nama_bulan as $key => $bulannnn) {
            $transaksi_gagal = transaksi::whereMonth('created_at', '=', date('m', strtotime($nama_bulan[$b])))->where('status', '=', 'expired')
            ->orWhere('status', '=', 'canceled')
            ->count();
            array_push($transaksi_total, $transaksi_gagal);
            $b++;
        }
        $d = 0;
        foreach($nama_bulan as $key => $bulannnn){
            $transaksi_penghasilan = transaksi::whereMonth('created_at', '=', date('m', strtotime($nama_bulan[$d])))->get();
            // print_r($transaksi_penghasilan);
            if(count($transaksi_penghasilan) == 0){
                $hasil = 0;
            }
            $status_bulan['harga'] = 0;
            foreach($transaksi_penghasilan as $item_b){
            if($item_b->status == 'verified' || $item_b->status == 'success'){
            $status_bulan['harga'] = $status_bulan['harga'] + $item_b->total;
            $hasil = $status_bulan['harga'];
            // echo $hasil;
            }
            }
            array_push($pendapatan, $hasil);
            $d++;
        }
        // $transaksi_semua = transaksi::whereMonth('created_at', '=', date('m', strtotime($nama_bulan[4])))->get();
        for($i = 1;$i<=12;$i++){
            $bulan[$i] = $transaksi = transaksi::whereMonth('created_at','=', $i)->whereYear('created_at','=', date('Y'))->count();
        }

        $daftar_user = User::get();
        // $daftar_transaksi = transaksi::get();
        $daftar_barang = detil_transaksi::whereYear('created_at','=', date('Y'))->whereMonth('created_at', '=', date('m'))->get();
            $status_barang = ['pertama' => 0,'kedua' => 0, 'ketiga' => 0];
            $status_barang['pertama'] = $this->findCountStatus(5,3);
            $status_barang['kedua'] = $this->findCountStatus(6,3);
            $status_barang['ketiga'] = $this->findCountStatus(8,3);
        // $daftar_user_email = User::get()->pluck('email');
        // return $pendapatan;
        return view('admin/dashboard', compact('status_bulan','transaksi_tahun','status_tahun', 'bulan', 'daftar_user', 'transaksi_total', 'status_barang', 'pendapatan', 'transaksi_penjualan_gagal'));
    }
    public function findCountStatus($status, $cek)
    {
        if($cek == 1){
            $count = transaksi::whereMonth('created_at','=', date('m'))->whereYear('created_at','=', date('Y'))->where('status',$status)->count();
        }elseif($cek == 2){
            $count = transaksi::whereYear('created_at','=', date('Y'))->where('status',$status)->count();
        }elseif($cek == 3){
            $count = detil_transaksi::whereMonth('transactions.created_at','=', date('m'))
            ->whereYear('transactions.created_at','=', date('Y'))
            ->join('transactions', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->whereNull('transactions.deleted_at')
            ->where('transaction_details.product_id',$status)->count();
        }
        return $count;
    }
    public function logout(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }
            return redirect('admin/login');
    }
}
