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
        Schema::create('subscription_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('subscription_plan_id');
            $table->string('plan_name');
            $table->decimal('plan_price', 8, 2);
            $table->text('cancellation_reason')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->date('renewal_date');
            // write an extra migrate fields here depend on your project requirement
            $table->boolean('status')->default(1);
            $table->string('payment_method');
            $table->string('payment_status')->default('pending');
            $table->string('transaction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_histories');
    }
};
