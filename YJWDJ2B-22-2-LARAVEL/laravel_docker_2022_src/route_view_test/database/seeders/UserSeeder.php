<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\DatabaseManager;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(DatabaseManager $manager, Hasher $hasher)
    {
        $datetime = Carbon::now()->toDateTimeString();
        // ①
        $userId = $manager->table('users')  // $userId = DB::table('users')
            ->insertGetId(
                [
                    'name' => 'laravel user1',
                    'email' => 'mail1@example.com',
                    'password' => $hasher->make('password'),
                    // 'password' => Hash::make('password'),
                    'created_at' => $datetime
                ]
            );
        // ②
        $manager->table('user_tokens')
            ->insert(
                [
                    'user_id' => $userId,
                    'api_token' => Str::random(60),
                    'created_at' => $datetime
                ]
            );
    }
}
