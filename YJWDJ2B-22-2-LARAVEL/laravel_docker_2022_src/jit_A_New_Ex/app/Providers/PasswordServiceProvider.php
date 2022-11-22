<?php

declare(strict_types=1);

namespace App\Providers;

use App\Auth\Passwords\PasswordManager;
use Illuminate\Auth\Passwords\PasswordResetServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class PasswordServiceProvider extends PasswordResetServiceProvider
{
    protected function registerPasswordBroker(): void
    {
        $this->app->singleton(  // 바인드 처리
            'auth.password',
            function (Application $app) {
                return new PasswordManager($app);
            }
        );
 
        $this->app->bind( // 바인드 처리
            'auth.password.broker',
            function (Application $app) {
                return $app->make('auth.password')->broker();
            }
        );
    }
}