<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect('product');
        }else{
            return view('login');
        }
    }

    public function loginaksi(Request $request){
        $data = [
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ];

        if(Auth::Attempt($data)){
            return redirect('product');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function logoutaksi(){
        Auth::logout();
        return redirect('/');
    }

    public function register(){
        return view('regist');
    }

    public function addReg(Request $request){
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];

        User::create($data);

        $infoLogin = [
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ];

        if(Auth::Attempt($infoLogin)){
            return view('login');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('regist');
        }
    }
}
