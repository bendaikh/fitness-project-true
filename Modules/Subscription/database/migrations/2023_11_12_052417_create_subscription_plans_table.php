<?php

use App\Enums\SubscriptionPlanType;
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
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name');
            $table->decimal('plan_price', 8, 2);
            $table->enum('expiration_date', SubscriptionPlanType::getAll())->default(SubscriptionPlanType::DAILY->value);
            //you can add here more migration field as a project requirements
            $table->boolean('status')->default(1);
            $table->string('serial');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_plans');
    }
};
