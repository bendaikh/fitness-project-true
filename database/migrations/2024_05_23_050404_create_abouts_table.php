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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('about_us_image')->nullable();
            $table->string('about_us_button_link')->nullable();
            $table->boolean('about_us_status')->default(1);
            $table->string('choose_us_image_1')->nullable();
            $table->string('choose_us_image_2')->nullable();
            $table->boolean('choose_us_status')->default(1);
            $table->string('choose_us_button_link')->nullable();
            $table->string('support_us_image')->nullable();
            $table->string('support_us_video')->nullable();
            $table->string('support_us_button_link')->nullable();
            $table->boolean('support_us_status')->default(1);
            $table->string('exercise_image')->nullable();
            $table->boolean('exercise_us_status')->default(1);
            $table->boolean('team_status')->default(1);
            $table->string('team_image')->nullable();
            $table->boolean('testimonial_status')->default(1);
            $table->string('testimonial_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
