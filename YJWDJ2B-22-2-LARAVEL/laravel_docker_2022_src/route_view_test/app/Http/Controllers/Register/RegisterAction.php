<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\Factory;
use Symfony\Component\HttpFoundation\RedirectResponse;

// Socialite 파사드 사용 가능

use Laravel\Socialite\Facades\Socialite;

class RegisterAction extends Controller
{
    public function __invoke(Factory $factory): RedirectResponse
    {
        // $factory: Laravel\Socialite\SocialiteManger 클래스의 인스턴스
        //return $factory->driver('github')->redirect();  // 깃헙 인증 페이지로 리다이렉트
        return Socialite::driver('github')->redirect();
    }
}
