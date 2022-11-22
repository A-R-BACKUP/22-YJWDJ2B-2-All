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
        UserTokenProviderInterface $provider  // CI 로 의존성 주입
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
        // ①
    }

    public function retrieveByCredentials(array $credentials)
    {
        if (!isset($credentials['api_token'])) {
            return null;
        }
        // ②
        $result = $this->provider->retrieveUserByToken($credentials['api_token']);  // DB접근 처리
        if (is_null($result)) {
            return null;
        }
        // ③
        return new User(
            (string) $result->user_id, // user_id(big int 타입)-> string 형변환
            $result->api_token,
            $result->name,
            $result->email
        );
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // ④
        return false;
    }
}
