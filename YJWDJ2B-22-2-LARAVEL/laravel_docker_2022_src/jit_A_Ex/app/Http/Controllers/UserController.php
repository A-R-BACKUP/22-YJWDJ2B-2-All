<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRegistPost;

class UserController extends Controller
{
    //
    public function index(Request $req): ViewFactory {  // :반환형
        $user =  User::find($req->get('id'));  // 모델

        return view('user.index',['user'=>$user]);  // 뷰

    }

    // public function store(Request $req):RedirectResponse{

    //     return new RedirectResponse();

    // }

    public function registview(){
        return view('regist.register');     
    }

    public function register(UserRegistPost $req){
 // 'name'의 밸리데이션 규칙에 'ascii_alpha' 추가
 $rules = [
    'name' => ['required', 'max:20', 'ascii_alpha'],
    'email' => ['required', 'email', 'max:225'],
];
$inputs = $req->all();
// 밸리데이션 규칙에 'ascii_alpha' 추가
Validator::extend('ascii_alpha', function ($attribute, $value, $parameters) {
    // 영대소문자이면 true(밸리데이션 OK)
    return preg_match('/^[a-zA-Z]+$/', $value);
});
$validator = Validator::make($inputs, $rules);
$validator->sometimes(
    'age',
    'integer|min:18',
    function ($inputs) {
        return $inputs->mailmagazine === 'allow';
    }
);

if ($validator->fails()) {
    // 밸리데이션 에러 시 처리
}
// 밸리데이션 통과 후 처리

        $name = $req->get('name');
        $email = $req->get('email');
        $password = $req->get('password');
        // $req가 일반Request이라면 아래 처리 해야함
        // if($name->length()<8){d
        //     //이름을 8자 이상으로 입력해야 한다.
        // }

        $user = User::create([  // 새로운 사용자 insert후 그 객체를 반환
            'name'=> $name,
            'email'=> $email,
            'password'=> Hash::make($password),
        ]);

        return view('regist.complete',compact('user'));

    }
}
