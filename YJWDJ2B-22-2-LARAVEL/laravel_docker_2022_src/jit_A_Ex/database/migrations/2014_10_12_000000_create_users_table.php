<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema; // 파사드 

//return new class extends Migration
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  // 마이그레이션 실행시 호출: 테이블생성됨
    {
        Schema::create(  // 테이블 생성 메서드            
            'users', // 생성하려는 테이블명
            function (Blueprint $table) {  // 생성실행하는 클로져
                $table->id();  // 프라이머리키, 자동증가, 유니크
                $table->string('name');// 파라미터: 필드명
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps(); // created_at, updated_at
            }
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()  // 마이그레이션 롤백, 리셋시 호출
    {
        Schema::dropIfExists('users');
    }
};
