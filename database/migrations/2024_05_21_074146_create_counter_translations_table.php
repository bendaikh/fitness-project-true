<?php

use App\Models\Counter;
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
        Schema::create('counter_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Counter::class)->constrained()->onDelete('cascade');
            $table->string('lang_code');
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counter_translations');
    }
};
