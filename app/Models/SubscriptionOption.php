<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Subscription\app\Models\SubscriptionPlan;

class SubscriptionOption extends Model
{
    use HasFactory;

    protected $fillable = ['subscription_id', 'name'];

    public function subscription()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }
}
