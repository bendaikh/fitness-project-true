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
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('specialty_id');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('hours_per_week')->nullable();
            $table->string('image')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('facebook_icon')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('twitter_icon')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('instagram_icon')->nullable();
            $table->json('skills')->nullable();
            $table->enum('status', [0, 1])->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('specialty_id')->references('id')->on('specialists')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
