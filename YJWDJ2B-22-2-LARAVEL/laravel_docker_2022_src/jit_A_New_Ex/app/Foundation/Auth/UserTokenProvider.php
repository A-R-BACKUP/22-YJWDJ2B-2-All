<?php

declare(strict_types=1);

namespace App\Foundation\Auth;

use App\DataProvider\UserTokenProviderInterface;
use App\Entity\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

use function is_null;

final class UserTokenProvider implements UserProvider
{
    private $provider;

    public function __construct(
        UserTokenProviderInterface $provider
    ) {
        $this->provider = $provider;
    }

    public function retrieveById($identifier)
    {
        return null;
    }

    public function retrieveByToken($identifier, $token)
    {
        return null;
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // ① API 앱, 자동로그인 처리 이용하지 못함 구현내용작성 안함
    }

    public function retrieveByCredentials(array $credentials)
    {
        if (!isset($credentials['api_token'])) {
            return null;
        }
        // ② UserToken의 DB조회 결과가 객체로 리턴
        $result = $this->provider->retrieveUserByToken($credentials['api_token']);
        if (is_null($result)) {
            return null;
        }
        // ③
        return new User(  // entity
            (string)$result->user_id,
            $result->api_token,
            $result->name,
            $result->email
        );
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // ④ API앱은 요청은 세션을 사용하지 않기 때문에 다시 사용하지 않도록 false
        return false;
    }
}
