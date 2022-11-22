<?php

declare(strict_type=1);

namespace App\Http\Controllers; // 자바의 패키지 역할

use Illuminate\Http\Request;   // 자바의 import문장 
use App\Models\User;   // 사용자 모델
use Illuminate\Support\Facades\Hash;// 암호화를 위해 사용
use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{
    public function create(){
        return view('regist.register');  // 도우미 함수
        // 파라미터: 문자열 - 문자열1.문자열2
        // 문자열1 - 폴더명
        // 문자열2 - 파일명
        // 프로젝트폴더\resources\views\regist\register.blade.php       
    }
    public function store(Request $req){
        // 입력값의 유효성 체크
        $req->validate([  // 연관배열
            'name'=>'required|string|max:255',   // 키=>값
            'email'=>['required','string','email','max:255','unique:users'],
            'password'=>'required|string|confirmed|min:8'
        ]);
        // required: 필수요소
        // max:숫자, min:숫자: 최대 글자, 최소 글자

        $user = User::create([  // 새로운 사용자 insert후 그 객체를 반환
            'name'=> $req->name,
            'email'=> $req->email,
            'password'=> Hash::make($req->password),
        ]);

        event(new Registered($user));


        return view('regist.complete',compact('user'));
    }
}
