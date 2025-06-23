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
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->decimal('price', 10, 2)->default(0.00);
            $table->decimal('compare_at_price', 10, 2)->default(0.00);
            $table->decimal('cost_per_item', 10, 2)->default(0.00);
            $table->boolean('taxable')->default(true);
            $table->boolean('track_inventory')->default(true);
            $table->boolean('out_of_stock_track_inventory')->default(false);
            $table->string('sku')->nullable()->unique();
            $table->decimal('weight', 10, 3)->default(0.00);
            $table->string('weight_unit')->nullable()->default('kg');
            $table->string('origin')->nullable();
            $table->string('barcode')->nullable();
            $table->boolean('is_default')->nullable()->default(false);
            $table->unsignedBigInteger('media_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
