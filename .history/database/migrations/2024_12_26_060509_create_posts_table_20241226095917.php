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
                $table->id();
                $table->string('title');
                $table->longText('description');
                $table->integer('id_category');
                $table->integer('id_user');
                $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade'); // مفتاح أجنبي لـ id_category
                $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade'); // مفتاح أجنبي لـ id_user
                $table->timestamps();
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
