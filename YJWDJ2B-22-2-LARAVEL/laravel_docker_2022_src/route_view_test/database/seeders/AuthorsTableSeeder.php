<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();  // Faker 인스턴스의 생성
        for($i=0;$i<10;$i++){
            $author =[
                'name'=> Str::substr($faker->text,0,98),
               // 'name'=> 'author ' . ($i+1),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            //\Illuminate\Support\Facades\DB::table('authors')->insert($author);
            DB::table('authors')->insert($author);  // 쿼리빌더

        }
    }
}
