<?php

use App\Models\HomePageSlider;
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
        Schema::create('home_page_slider_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(HomePageSlider::class)->constrained()->onDelete('cascade');
            $table->string('lang_code');
            $table->string('title');
            $table->string('subtitle_1')->nullable();
            $table->string('subtitle_2')->nullable();
            $table->string('button_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_slider_translations');
    }
};
