<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('board_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ko', '255')->unique()->comment('게시판 이름 한글명');
            $table->string('name', '255')->unique()->comment('게시판 이름 영문명');
            $table->string('path', '255')->comment('라우터 경로');
            $table->unsignedInteger('order')->comment('정렬순서');
            $table->unsignedInteger('visibility')->comment('공개상태');
            $table->unsignedInteger('parent_id')->comment('부모 아이디(부모 값이 없으면 본인 id값)');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_info');
    }
};
