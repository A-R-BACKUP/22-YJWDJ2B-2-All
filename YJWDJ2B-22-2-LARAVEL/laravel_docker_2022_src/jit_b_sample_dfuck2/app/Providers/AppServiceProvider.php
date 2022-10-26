<?php

namespace App\Providers;

use App\BlowfishEncrypter;
use Illuminate\Encryption\MissingAppKeyException;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() // ServiceProvider의 register()를 오버라이드
    {
        // 일반적으로 여기에 바인드 처리, 필수 구현
        $this->app->singleton(
            'encrypter',
            function ($app) {
                $config = $app->make('config')->get('app');

                return new BlowfishEncrypter($this->parseKey($config));
            }
        );
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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 선택 구현, 인스턴스 생성시 다른 클래스를 이용해야 할때 바인드처리
    }
}
