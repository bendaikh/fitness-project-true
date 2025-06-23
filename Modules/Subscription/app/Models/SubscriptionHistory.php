<?php

namespace Modules\Subscription\app\Models;

use App\Models\Member;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['member_id', 'subscription_plan_id', 'plan_name', 'plan_price', 'cancellation_reason', 'start_date', 'end_date', 'renewal_date', 'status', 'payment_method', 'transaction', 'subscription_type', 'total_amount', 'invoice_id', 'payment_status'];

    /**
     * Get the member that owns the subscription history.
     */
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    /**
     * Get the subscription plan that owns the subscription history.
     */
    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'subscription_id');
    }
}
