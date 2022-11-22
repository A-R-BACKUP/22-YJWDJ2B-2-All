<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Database\Seeders\UserSeeder; // 생략가능 - 같은 네임스페이스 내에 존재

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //$this->call(AuthorsTableSeeder::class);  // 시더클래스 등록
        //\App\Models\Publisher::factory(20)->create();
        $this->call(
            [ 
                UserSeeder::class
            ]
        );
    }
}
