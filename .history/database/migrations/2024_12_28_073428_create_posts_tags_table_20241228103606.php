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
        Schema::create('posts_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tag');
            $table->unsignedBigInteger('id_post');
            $table->foreign('id_post')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('id_tag')->references('id')->on('tags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_tags');
    }
};
