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
        Schema::create('home_page_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->string('button_text')->nullable();
            $table->string('button_icon')->default('fab fa-whatsapp');
            $table->string('button_link')->nullable();
            $table->tinyInteger('home_page');
            $table->tinyInteger('order')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_sliders');
    }
};
