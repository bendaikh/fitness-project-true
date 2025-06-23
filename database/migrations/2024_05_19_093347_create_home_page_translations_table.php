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
        Schema::create('home_page_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('home_page_id');
            $table->string('lang_code');
            $table->string('about_us_title')->nullable();
            $table->text('about_us_description')->nullable();
            $table->string('pricing_title')->nullable();
            $table->text('pricing_description')->nullable();
            $table->string('about_us_inner_title')->nullable();
            $table->string('about_us_sub_title')->nullable();
            $table->json('about_us_description_list')->nullable();
            $table->string('about_us_button_text')->nullable();
            $table->string('team_title')->nullable();
            $table->string('team_button_text')->nullable();
            $table->string('video_section_title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_translations');
    }
};
