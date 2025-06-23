<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Subscription\app\Models\SubscriptionPlan;

class MemberSubscription extends Model
{
    use HasFactory;

    protected $table = 'member_subscriptions';

    protected $fillable = ['member_id', 'subscription_plan_id', 'subscription_status', 'available_trial', 'payment_status', 'due_at', 'due_amount', 'is_trial', 'trial_start_date', 'trial_end_date', 'status'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }

    public function getSubscriptionStatusAttribute($value)
    {
        return $value ? 'Active' : 'Inactive';
    }

    public function getPaymentStatusAttribute($value)
    {
        return ucfirst($value);
    }

    public function getIsTrialAttribute($value)
    {
        return $value ? 'Trial' : 'Not Trial';
    }

}
