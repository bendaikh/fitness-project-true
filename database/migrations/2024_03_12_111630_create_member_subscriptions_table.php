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
        Schema::create('member_subscriptions', function (Blueprint $table) {
            $table->id();
            // Foreign keys
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('subscription_plan_id')->nullable();

            // Subscription details
            $table->boolean('subscription_status')->default(1)->comment('1=active, 0=inactive');
            $table->boolean('available_trial')->default(1)->comment('1=yes, 0=no');
            $table->enum('payment_status', ['pending', 'success', 'due'])->default('pending');
            $table->timestamp('due_at')->nullable();
            $table->double('due_amount')->default(0)->nullable();
            $table->boolean('is_trial')->default(false)->comment('1=trial, 0=not trial');
            $table->date('trial_start_date')->nullable();
            $table->date('trial_end_date')->nullable();

            $table->boolean('status')->default(false);

            // relation
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_subscriptions');
    }
};
