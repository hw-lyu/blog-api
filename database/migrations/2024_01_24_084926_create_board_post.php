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
        Schema::create('board_post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->comment('게시물 제목');
            $table->longText('content')->comment('게시글 본문');
            $table->unsignedInteger('board_id')->comment('게시판명');
            $table->json('tags')->comment('태그명 리스트 (직렬화)');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_post');
    }
};
