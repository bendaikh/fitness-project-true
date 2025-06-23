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
        Schema::create('section_content_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_content_id')->constrained()->onDelete('cascade');
            $table->string('lang_code');
            $table->string('program_title')->nullable();
            $table->string('pricing_title')->nullable();
            $table->string('blog_title')->nullable();
            $table->string('products_title')->nullable();
            $table->string('testimonial_title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_content_translations');
    }
};
