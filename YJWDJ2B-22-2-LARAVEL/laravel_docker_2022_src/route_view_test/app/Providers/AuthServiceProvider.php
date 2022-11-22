<?php

namespace App\Providers;

use App\Foundation\Auth\CacheUserProvider;
use Illuminate\Contracts\Foundation\Application;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Foundation\Auth\UserTokenProvider;
use App\DataProvider\UserToken;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // p. 246페이지 내용 참고 등록  (서비스컨테이너에 등록)

        $this->app->make('auth')->provider(
            'cache_eloquent',
            function (Application $app, array $config) {
                return new CacheUserProvider(
                    $app->make('hash'),
                    $config['model'],
                    $app->make('cache')->driver()
                );
            }
        );

        $this->app->make('auth')->provider(
            'user_token',
            function (Application $app, array $config) {
                // ②
                return new UserTokenProvider(new UserToken($app->make('db')));
            }
        );


    }
}
