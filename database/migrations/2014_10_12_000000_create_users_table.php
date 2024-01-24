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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('이름');
            $table->string('email')->unique()->comment('이메일');
            $table->timestamp('email_verified_at')->nullable()->comment('이메일 인증');
            $table->string('password')->comment('패스워드');
            $table->enum('is_admin', [1,0])->default(0)->comment('관리자 상태값');
            $table->rememberToken()->comment('리멤버 토큰값');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
