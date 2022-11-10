<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Response;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Response as Res;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    public function index(Request $req): ViewFactory{
        $user = User::find($req->get('id'));
        return view('user.index',['user'=>$user,]);

    }
    public function store(Request $req):RedirectResponse{
        return Response::redirectTo('/');
    }
    public function detail(string $id):ViewFactory{
        return view('user.detail');
    }
    public function userDetail(string $id): Res{
        return new Res(view('user.detail'), Res::HTTP_OK);
    }
    public function create(){
        return view('regist.register');  
        // laravel_root/resources/views/regist/register.blade.php 
    }
    public function register(UserRegistPost $req){
        $name= $req->get('name');
        $email= $req->get('email');
        $password= $req->get('password');

        $user = User::create(
            [
                'name'=>$name,
                'email'=>$email,
                'password'=>Hash::make($password),
                
            ]
        );
        return view('regist.complete',compact('user'));

    }
}
