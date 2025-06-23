<?php

use App\Models\PagesUtility;
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
        Schema::create('pages_utility_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PagesUtility::class)->constrained();
            $table->string('lang_code', 5);
            $table->string('footer_copyright')->nullable();
            $table->string('cta_button')->nullable();
            $table->string('app_download_now_text')->nullable();
            $table->string('experience_title')->nullable();
            $table->string('time_table_title')->nullable();
            $table->string('service_title')->nullable();
            $table->string('award_title')->nullable();
            $table->string('faq_title')->nullable();
            $table->string('membership_title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages_utility_translations');
    }
};
