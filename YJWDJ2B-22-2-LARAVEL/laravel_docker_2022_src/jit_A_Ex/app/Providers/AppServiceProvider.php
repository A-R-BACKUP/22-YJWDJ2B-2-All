<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\BlowfishEncrypter;
use Illuminate\Support\Str;
use Illuminate\Encryption\MissingAppKeyException;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 일반적으로 사용되는 인스턴스 bind 처리하기
        $this->app->singleton(
            'encrypter',
            function ($app) {
                $config = $app->make('config')->get('app');

                return new BlowfishEncrypter($this->parseKey($config));
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 인스턴스 생성시 다른 인스턴스생성할 때 필요한 bind처리
    }
    protected function parseKey(array $config)
    {
        if (Str::startsWith($key = $this->key($config), $prefix = 'base64:')) {
            $key = base64_decode(Str::after($key, $prefix));
        }

        return $key;
    }
    protected function key(array $config)
    {
        return tap(
            $config['key'],
            function ($key) {
                if (empty($key)) {
                    throw new MissingAppKeyException;
                }
            }
        );
    }

}
