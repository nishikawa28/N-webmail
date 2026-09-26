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
        Schema::create('posts', function (Blueprint $table) {
            // 9/18 14:24 addtion
            $table->id();       
            $table->string('author_name');   // 投稿者名 
            $table->string('title');   // タイトル (文字列)
            $table->string('content'); //本文
            $table->timestamps();      // created_at / updated_at (日時)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};