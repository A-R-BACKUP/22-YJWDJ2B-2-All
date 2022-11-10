<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publisher>
 */
class PublisherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 팩토리로  생성해서 테이블에 넣을 데이터의 구조를 배열로 정의
            'name'=> $this->faker->company . ' Pub.',
            'address' => $this->faker->address,
             'created_at' => now(),
             'updated_at' => now(),
        ];
    }
}
