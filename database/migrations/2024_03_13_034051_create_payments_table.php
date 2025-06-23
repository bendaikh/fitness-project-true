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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->unsignedBigInteger('enrollment_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('payment_confirmation_by')->nullable();

            // Payment details

            $table->string('payment_method');
            $table->string('transaction_id')->nullable();
            $table->string('currency')->default('USD');
            $table->enum('payment_type', ['recurring', 'one-time'])->default('one-time');
            $table->enum('payment_mode', ['manual', 'automatic'])->default('manual');
            $table->enum('payment_for', ['subscription', 'workout', 'order'])->default('subscription');
            $table->enum('payment_status', ['pending', 'success', 'due'])->default('pending');
            $table->double('total_amount', 8, 2);
            $table->double('due_amount')->default(0)->nullable();

            // Transaction status
            $table->boolean('status')->default(false);
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('refunded_at')->nullable();
            $table->timestamp('failed_at')->nullable();


            // relation
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subscription_id')->references('id')->on('subscription_histories')->onDelete('cascade');
            $table->foreign('enrollment_id')->references('id')->on('workout_enrollments')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('payment_confirmation_by')->references('id')->on('admins')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
