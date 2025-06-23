<?php

namespace Database\Seeders;

use App\Enums\SubscriptionPlanType;
use Illuminate\Database\Seeder;
use Modules\Subscription\app\Models\SubscriptionPlan;

class BasicPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planNames = ['Basic Plan', 'Standard Plan', 'Premium Plan'];

        $expirationDates = SubscriptionPlanType::getAll();

        foreach (range(1, 3) as $index) {
            $planName = $planNames[$index - 1];

            $subscription = SubscriptionPlan::create([
                'plan_name' => $planName,
                'plan_price' => 100 * $index,
                'expiration_date' => $expirationDates[array_rand($expirationDates)],
                'status' => 1,
                'serial' => $index,
            ]);

            foreach(range(1,5) as $index){
                $subscription->options()->create([
                    'name' => 'Option ' . $index,
                ]);
            }
        }
    }
}
