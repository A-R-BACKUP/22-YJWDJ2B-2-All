<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testStausCode(){
        $response = $this->get('/home');
        $response->assertStatus(200);

    }
    public function testBody(){
        $response = $this->get('/home');
        //$response->assertSeeText("안녕하세요?");
        $response->assertSeeText("안녕? 라라벨! 잘해보자!");
        
    }
}
