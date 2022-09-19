<?php
//:: 파사드 Facades

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class LoginController extends Controller
{
    //
    public function index(){
        //모델처리: 비지니스 로직 구현
        return view('auth.login'); // /resources/views/auth/login.blade.php
    }

    public function authenticate(Request $req){
        $credentials = $req->only('email','password'); // 인증정보
        if(Auth::attempt($credentials)){ // 로그인 시도
            $req->session()->regenerate(); // 기존에 있던 세션 정보를 다시 만든다.
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        return back()->withErrors(
            ['message'=>'메일주소 또는 비밀번호 오류']
        );
    }
    public function logout(Request $req){
        Auth::logout();

        $req->session()->invalidate(); // 세션 객체 무효화
        $req->session()->regenerateToken(); // 토큰도 다시 업데이트 하라
        return redirect(RouteServiceProvider::HOME);
    }
}
