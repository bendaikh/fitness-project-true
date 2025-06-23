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
        Schema::create('workout_category_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workout_category_id')->constrained('workout_categories')->onDelete('cascade');
            $table->string('lang_code', 2);
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_category_translations');
    }
};
