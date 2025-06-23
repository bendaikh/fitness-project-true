<?php

namespace Modules\Subscription\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Subscription\app\Models\SubscriptionPlan;

class SubscriptionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $data = [
            [
                'plan' => [
                    'plan_name' => 'Basic',
                    'plan_price' => 100,
                    'yearly_price' => 1000,
                    'serial' => 1,
                    'status' => 1,
                    'expiration_date' => 'monthly',
                    'free_trial' => 0,
                ],
                'feature' => [
                    'Access to Core Services',
                    'Standard In-Person Support',
                    'Access to Basic Resources',
                    'Basic Practice Materials',
                    'Regular Class Updates',
                    'Basic Participant Management',
                ]
            ],
            [
                'plan' => [
                    'plan_name' => 'Standard',
                    'plan_price' => 200,
                    'yearly_price' => 2000,
                    'serial' => 2,
                    'status' => 1,
                    'expiration_date' => 'monthly',
                    'free_trial' => 0,
                ],
                'feature' => [
                    'Access to Core Services',
                    'Priority In-Person Support',
                    'Expanded Resources',
                    'Enhanced Practice Materials',
                    'Priority Class Updates',
                    'Training Workshops',
                    'Locker Facility',
                ]
            ],
            [
                'plan' => [
                    'plan_name' => 'Premium',
                    'plan_price' => 300,
                    'yearly_price' => 3000,
                    'serial' => 3,
                    'status' => 1,
                    'expiration_date' => 'monthly',
                    'free_trial' => 0,
                ],
                'feature' => [
                    'Access to Core Services',
                    'Priority In-Person Support',
                    'Exclusive Resources',
                    'Advanced Practice Materials',
                    'Early Access to New Classes',
                    'Locker Facility',
                ]
            ],
        ];

        foreach ($data as $key => $value) {
            $plan = SubscriptionPlan::create($value['plan']);
            foreach ($value['feature'] as $feature) {
                $plan->options()->create(['name' => $feature]);
            }
        }
    }
}
