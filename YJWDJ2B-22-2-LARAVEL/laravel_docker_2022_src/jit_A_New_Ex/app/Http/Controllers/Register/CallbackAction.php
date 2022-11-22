<?php

declare(strict_types=1);

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Laravel\Socialite\Contracts\Factory;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use Psr\Log\LoggerInterface;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;


final class CallbackAction extends Controller
{
    public function __invoke(
        Factory $factory,
        AuthManager $authManager,
        LoggerInterface $log
    ) {
        // ①
        $user = $factory->driver('github')->user();
        // ②
        $authManager->guard()->login(
            User::firstOrCreate(  //최초 시도시 DB에 정보 저장
                [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => '',
                ]
            ),
            true // 자동로그인 쿠키 발행 여부 체크
        );
        /*
        * Facade를 이용할 떄는 다음과 같이 기술한다
        */
/*         $user = Socialite::driver('github')->user();
        Auth::login(
            User::firstOrCreate(
                [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                ]
            ),
            true
        ); */

        $driver = $factory->driver('github');
        $user = $driver->setHttpClient(
            new Client(
                [
                    'handler' => tap(
                        HandlerStack::create(),
                        function (HandlerStack $stack) use ($log) {
                            $stack->push(Middleware::log($log, new MessageFormatter()));
                        }
                    )
                ]
            )
        )->user();
        


        return redirect('/home');
    }
}
