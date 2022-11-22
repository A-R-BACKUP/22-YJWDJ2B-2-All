<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\Factory;
use Laravel\Socialite\Facades\Socialite;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;

use Psr\Log\LoggerInterface;

class CallbackAction extends Controller
{
    public function __invoke(
        Factory $factory,
        AuthManager $authManager,
        LoggerInterface $log
    ){
        $user = $factory->driver('github')->user();
        $authManager->guard('jwt')->login(
            User::firstOrCreate(
                [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => '',
                ]
            ),
            true
        );
/*         Auth::login(
            User::firstOrCreate(
                [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => '',
                ]
            ),
            true
        ); */
        /* $driver = $factory->driver('github');
        // $driver->with(['allow_signup'=>'false']);
        // $driver->sateless()->user();
        $user = $driver->setHttpClient(  // Guzzle
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
        Auth::login(
            User::firstOrCreate(
                [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => '',
                ]
            ),
            true
        ); */


        // $authManager->guard()->login(
        //     User::firstOrCreate(
        //         [
        //             'name' => $user->getName(),
        //             'email' => $user->getEmail(),
        //             'password' => '',
        //         ]
        //     ),
        //     true
        // );
       /*
        * Facade를 이용할 떄는 다음과 같이 기술한다
        
        $user = Socialite::driver('github')->user();
        Auth::login(
            User::firstOrCreate(
                [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                ]
            ),
            true
        );*/


        return redirect('/t/'.$user->getName());
    }
}
