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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('subtitle', 255)->nullable();
            $table->string('heading', 255)->nullable();
            $table->string('cover_image', 255)->nullable();
            $table->string('content_image', 255)->nullable();
            $table->string('price', 255)->nullable();
            $table->string('sale_price', 255)->nullable();
            $table->text('desc')->nullable();
            $table->json('chapters')->nullable();
            $table->json('reviews')->nullable();
            $table->string('author', 255)->nullable();
            $table->string('job_title', 255)->nullable();
            $table->string('author_avatar', 255)->nullable();
            $table->text('author_desc')->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('location', 255)->nullable();
            $table->text('footer_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
