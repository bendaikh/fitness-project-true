<?php

use App\Models\Facility;
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
        Schema::create('facility_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Facility::class)->constrained('facilities')->cascadeOnDelete();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('lang_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_translations');
    }
};
