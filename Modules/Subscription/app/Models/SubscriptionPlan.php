<?php

namespace Modules\Subscription\app\Models;

use App\Models\SubscriptionOption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    public function options()
    {
        return $this->hasMany(SubscriptionOption::class, 'subscription_id', 'id');
    }
}
