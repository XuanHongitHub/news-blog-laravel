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
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->string('comment_content', 100);
            $table->foreignId('subscriber_id')->constrained('subscriber');
            $table->foreignId('news_id')->constrained('news');
            $table->date('comment_date');
            $table->tinyInteger('comment_status');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
