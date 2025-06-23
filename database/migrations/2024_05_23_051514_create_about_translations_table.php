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
        Schema::create('about_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_id')->constrained('abouts')->onDelete('cascade');
            $table->string('lang_code', 2);
            $table->string('title')->nullable();
            $table->string('about_us_title')->nullable();
            $table->text('about_us_description')->nullable();
            $table->string('about_us_button_text')->nullable();
            $table->string('choose_us_title')->nullable();
            $table->text('choose_us_description')->nullable();
            $table->string('choose_us_button_text')->nullable();
            $table->string('support_us_title')->nullable();
            $table->text('support_us_description')->nullable();
            $table->string('support_us_button_text')->nullable();
            $table->string('exercise_title')->nullable();
            $table->text('exercise_description')->nullable();
            $table->string('team_title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_translations');
    }
};
