<?php

use App\Models\GymService;
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
        Schema::create('gym_service_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(GymService::class)->constrained('gym_services');
            $table->string('name');
            $table->string('lang_code');
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gym_service_translations');
    }
};
