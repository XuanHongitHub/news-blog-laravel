<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('title', 100);
            $table->string('summary', 1000)->nullable();
            $table->text('preview');
            $table->text('content');
            $table->unsignedBigInteger('views')->default(0);
            $table->string('tags', 1000)->nullable();
            $table->string('slug', 255)->nullable();
            $table->tinyInteger('news_status');
            $table->tinyInteger('comment_status')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
