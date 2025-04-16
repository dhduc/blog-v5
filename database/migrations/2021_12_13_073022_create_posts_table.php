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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('desc')->nullable();
            $table->longText('content');
            $table->date('modified_at')->nullable();
            $table->date('published_at')->nullable();
            $table->boolean('is_visible')->default(false);
            $table->boolean('is_sponsored')->default(false);
            $table->string('seo_title', 60)->nullable();
            $table->string('seo_description', 160)->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
