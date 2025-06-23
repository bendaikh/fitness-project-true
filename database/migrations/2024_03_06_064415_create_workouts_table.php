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
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->json('tool_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->json('videos')->nullable();
            $table->integer('training_days')->nullable();
            $table->integer('class_count')->nullable();
            $table->double('price', 8, 2)->default(0);
            $table->integer('capacity')->default(0);
            $table->date('enroll_start')->nullable();
            $table->date('enroll_end')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->enum('status', [0, 1])->default(1)->comment('0=Inactive, 1=Active');
            $table->foreign('category_id')->references('id')->on('workout_categories')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('admins')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('admins')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workouts');
    }
};
