<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= \Faker\Factory::create();
        for($i=1;$i<=10;$i++){
            $author = [
                //'name'=>'author ' . $i,
                'name'=> $faker->country,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DB::table('authors')->insert($author);
        }
    }
}
