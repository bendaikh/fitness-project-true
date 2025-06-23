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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('banner')->nullable();
            $table->json('images')->nullable();
            $table->json('videos')->nullable();
            $table->json('tags')->nullable();
            $table->string('registration_link')->nullable();
            $table->string('organized_by');
            $table->enum('status', ['draft', 'published', 'unpublished'])->default('draft');
            $table->json('contributors')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
