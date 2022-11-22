<?php

declare(strict_types=1);

namespace App\DataProvider;

use Illuminate\Database\DatabaseManager;
use stdClass;

final class UserToken implements UserTokenProviderInterface
{
    private $manager;
    private $table = 'user_tokens';

    public function __construct(
        DatabaseManager $manager
    ) {
        $this->manager = $manager;
    }

    public function retrieveUserByToken(string $token): ?stdClass
    {    // 토큰정보를 이용하여 DB 엑세스해서 사용자 정보 조회 
        return $this->manager->connection()->table($this->table)  // ① DB::table($this->table) or DB::table('user_tokens')
            ->join('users', 'users.id', '=', 'user_tokens.user_id')
            ->where('api_token', $token)
            ->first(['user_id', 'api_token', 'name', 'email']);
    }
}