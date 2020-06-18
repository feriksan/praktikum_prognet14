<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\verifyUser;
use \Mail;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\AUTH;
use Illuminate\Support\Facades\AuthenticatesUsers;

class userController extends Controller
{
    public function userLogin(){
        return view('user/loginUser');
    }

    public function dashboard(){
        return view('user/beli');
    }

    public function loginSubmit(Request $request){
        $data = $request->only('email','password');
        if(Auth::guard('user')->attempt($data)){
            return redirect('user/beli')->with('success','Anda Telah Masuk Dashboard User');
            }else{
                return redirect('user/login')->with('error','Email atau Password Salah!');
        }
    }

    public function userRegister(){
        return view('user/registerUser');
    }

    public function registerSubmit(Request $request){

        $validator = Validator::make(request()->all(),[
           'email' => 'required|email|unique:users,email',
           'file' => 'required|max:700'
            ]);

        $valid = Validator::make(request()->all(),[
           'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
           'password_confirmation' => 'min:8'
            ]);

    if ($validator->fails()){
            return redirect('user/register')->with('error','Email Sudah Digunakan!');

    }elseif ($valid->fails()){
            return redirect('user/register')->with('error','Password Tidak Sesuai!');
            
    } else {
        $file = $request->file('file');
        $tujuan = 'fotouser\\';
        $disimpan = $tujuan.$file->getClientOriginalName();
        $file->move($tujuan,$file->getClientOriginalName());

        $new = new User;
        $new->name = $request->name;
        $new->email = $request->email;
        $new->password = Hash::make($request->password);
        $new->status = $request->status;
        $new->profile_image = $disimpan;
        $new->save();

        Mail::to($request->email)->send(new verifyUser($new));

        return redirect('user/login')->with('warning','Silakan Verifikasi Email untuk Melanjutkan Login!');
    }
    }

    public function verifyEmailUser($email){
        $veri = DB::statement('UPDATE users SET users.email_verified_at=NOW() WHERE users.email = ?',array($email));

        return redirect('user/login')->with('success','Email Telah Diverifikasi, Silakan Login');
    }
    public function atur_alamat(){
        return view('user.preference.profile');
    }

    public function logout(){
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
            return redirect('user/login');
    }
}

