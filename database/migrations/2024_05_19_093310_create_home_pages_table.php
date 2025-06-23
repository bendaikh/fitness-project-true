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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('home');
            $table->json('about_us_images')->nullable();
            $table->string('about_us_image')->nullable();
            $table->string('about_us_bg_shape_1')->nullable();
            $table->string('about_us_bg_shape_2')->nullable();
            $table->string('about_us_button_link')->nullable();
            $table->string('pricing_image')->nullable();
            $table->string('team_bg_image')->nullable();
            $table->string('team_button_link')->nullable();
            $table->string('video_bg_image')->nullable();
            $table->string('video_button_link')->nullable();
            $table->string('video_button_icon')->nullable();
            $table->string('testimonial_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
