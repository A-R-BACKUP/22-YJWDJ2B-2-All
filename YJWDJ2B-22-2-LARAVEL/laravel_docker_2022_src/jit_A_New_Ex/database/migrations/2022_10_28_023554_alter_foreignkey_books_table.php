<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('bookdetail_id');
            $table->foreign('bookdetail_id')->references('id')->on('bookdetails');
            //$table->foreign('bookdetail_id')->references('id')->on('bookdetails')
            //->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            //
            $table->dropForeign('books_bookdetail_id_foreign');
            //관례 - 관계명칭자동생성
            // 관계명칭: 테이블명_컬럼명_foreign
            // books_bookdetail_id_foreign

            $table->dropColumn('bookdetail_id');
        });
    }
};
