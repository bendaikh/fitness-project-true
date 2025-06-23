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
        Schema::create('workout_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('workout_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->text('message');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_contacts');
    }
};
