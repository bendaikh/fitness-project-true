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
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('is_featured')->default(false)->after('status');
            $table->boolean('is_bestseller')->default(false)->after('is_featured');
            $table->boolean('is_new')->default(false)->after('is_bestseller');
            $table->boolean('is_top')->default(false)->after('is_new');
            $table->boolean('is_hot')->default(false)->after('is_top');
            $table->boolean('is_warranty')->nullable()->after('stock_status');
            $table->string('warranty_duration')->nullable()->after('is_warranty');
            $table->boolean('is_returnable')->default(false)->after('warranty_duration');
            $table->boolean('is_exchangeable')->default(false)->after('is_returnable');
            $table->boolean('is_refundable')->default(false)->after('is_exchangeable');
            $table->boolean('is_cod')->default(false)->after('is_refundable');
            $table->boolean('is_emi')->default(false)->after('is_cod');
            $table->boolean('is_guest_checkout')->default(false)->after('is_emi');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
