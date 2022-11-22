<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;  // 날짜 처리, 타임스탬프관련
use Illuminate\Database\Seeder;
use Illuminate\Database\DatabaseManager;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Str;

final class UserSeeder extends Seeder
{
    public function run(DatabaseManager $manager, Hasher $hasher): void
    {
        $datetime = Carbon::now()->toDateTimeString();
        // ①
        $userId = $manager->table('users')
            ->insertGetId(
                [
                    'name' => 'laravel user',
                    'email' => 'mail@example.com',
                    'password' => $hasher->make('password'),
                    'created_at' => $datetime
                ]
            );
        // ②
        $manager->table('user_tokens')
            ->insert(
                [
                    'user_id' => $userId,
                    'api_token' => Str::random(60),  //랜덤하게 60개 글자 생성
                    'created_at' => $datetime
                ]
            );
    }
}
