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
        DatabaseManager $manager  // CI : 생성자 주입
    ) {
        $this->manager = $manager;
    }

    public function retrieveUserByToken(string $token): ?stdClass
    {
        return $this->manager->connection() // ①
        ->table($this->table)  // ->table('user_tokens')
        // DB::table($this->table)
            ->join('users', 'users.id', '=', 'user_tokens.user_id')
            ->where('api_token', $token)
            ->first(['user_id', 'api_token', 'name', 'email']);
    }
}
