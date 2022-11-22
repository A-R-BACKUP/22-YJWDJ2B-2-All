<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Foundation\Auth\CacheUserProvider;
use App\Foundation\Auth\UserTokenProvider;
use Illuminate\Contracts\Foundation\Application;  // 서비스 컨테이너
use App\DataProvider\UserToken;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        $gate->define(  // Gate::define()
            'user-access',
            function (User $user, $id) {
                return intval($user->getAuthIdentifier()) === intval($id);
            }
        );


        // 구현 드라이버 등록: 서비스 컨테이너로 바인드 등록
        $this->app->make('auth')->provider(
            'cache_eloquent',  // 프로바이더 이름, 리졸브시 사용, 지정처리
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
            function (Application $app,array $config){
                return new UserTokenProvider(new UserToken($app->make('db')));
            }
        );

    }
}
