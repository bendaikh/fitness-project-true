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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->string('coupon_code');
            $table->date('expired_date');
            $table->decimal('discount', 8, 2);
            $table->decimal('min_price', 8, 2)->nullable();
            $table->enum('offer_type', [1, 2])->default(1)->comment('1=Percentage, 2=Flat');
            $table->integer('max_quantity');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
