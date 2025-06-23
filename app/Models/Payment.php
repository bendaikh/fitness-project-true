<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\app\Models\Order;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = ['user_id', 'subscription_id', 'workout_id', 'order_id', 'payment_confirmation_by', 'payment_method', 'transaction_id', 'currency', 'payment_type', 'payment_mode', 'payment_for', 'payment_status', 'total_amount', 'due_amount', 'status', 'paid_at', 'cancelled_at', 'refunded_at', 'failed_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription()
    {
        return $this->belongsTo(MemberSubscription::class, 'subscription_id');
    }

    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function paymentConfirmationBy()
    {
        return $this->belongsTo(Admin::class, 'payment_confirmation_by');
    }

    public function getPaymentStatusAttribute($value)
    {
        return ucfirst($value);
    }

    public function getPaymentTypeAttribute($value)
    {
        return ucfirst($value);
    }

}
