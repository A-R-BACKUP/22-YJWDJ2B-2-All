<?php
declare(strict_types=1);

namespace App\Http\Controllers;  // 자바의 패키지 개념

use App\Models\User;   // 자바의  import 유사
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // 암호화를 위해
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller{
    public function create(){
        return view('regist.register');  
        // laravel_root/resources/views/regist/register.blade.php 
    }
    public function store(Request $request){
        // 사용자 입력에 대한 유효성 체크
        $request->validate([  // 연관배열
            'name' => 'required|string|max:255',  // key => value
            'email' =>'required|string|email|max:255|unique:users',
            'password'=>'required|string|confirmed|min:8'      
            // required: 필수입력값
            // string: 입력값의 데이터 타입 
            // unique: 유니크한 값 

        ]);
        $user = User::create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                
            ]
        );
        event(new Registered($user)); // 이벤트 트리커
        return view('regist.complete',compact('user'));

    }

}




