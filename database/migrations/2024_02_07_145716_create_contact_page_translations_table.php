<?php

use App\Models\ContactPage;
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
        Schema::create('contact_page_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ContactPage::class)->constrained();
            $table->string('lang_code');
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_page_translations');
    }
};
