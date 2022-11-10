<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    //
    public function index(){
        // 모델처리: 비즈니스 로직 구현
        return view('auth.login'); // /resources/views/auth/login.blade.php
    }

    public function authenticate(Request $req){
        $credentials = $req->only('email','password');
        if(Auth::attempt($credentials)){  // 로그인 시도
            $req->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        return back()->withErrors(
            ['message'=>'메일주소 또는 비번 오류',]
        );

    }

    public function logout(Request $req){
        Auth::logout();

        $req->session()->invalidate();  // 세션 객체 무효화
        $req->session()->regenerateToken();
        return redirect(RouteServiceProvider::HOME);
    }
}
