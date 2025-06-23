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
        Schema::create('pages_utilities', function (Blueprint $table) {
            $table->id();
            $table->boolean('footer_app_button_status')->default(1);
            $table->string('login_image')->nullable();
            $table->string('experience_image')->nullable();
            $table->string('class_time_image')->nullable();
            $table->string('cta_link')->nullable();
            $table->string('cta_icon')->nullable();
            $table->string('register_image')->nullable();
            $table->string('forget_password_image')->nullable();
            $table->string('reset_password_image')->nullable();
            $table->string('ios_app_link')->nullable();
            $table->string('android_app_link')->nullable();
            $table->integer('price_range')->nullable()->default(20000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages_utilities');
    }
};
