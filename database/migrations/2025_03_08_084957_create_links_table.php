<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up() : void
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('url')->unique();
            $table->string('image_url')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('is_sponsored')->default(false);
            $table->timestamp('is_approved')->nullable();
            $table->timestamp('is_declined')->nullable();
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('links');
    }
};
