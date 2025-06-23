<?php

namespace App\Models;

use App\Traits\UpdateGenericClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Attendance\app\Models\Attendance;
use Modules\Subscription\app\Models\SubscriptionHistory;
use Modules\Subscription\app\Models\SubscriptionPlan;

class Member extends Model
{
    use HasFactory, UpdateGenericClass;
    protected $table = 'members';
    protected $fillable = [
        'user_id',
        'member_id',
        'locker_no',
        'gender',
        'dob',
        'height',
        'weight',
        'chest',
        'waist',
        'thigh',
        'referred_by',
        'created_by',
        'updated_by',
        'blood_group',
        'phone',
        'emergency_contact',
        'emergency_phone',
        'emergency_relation',
        'profile_image',
        'cover_image',
        'status',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
    public function referredBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'referred_by');
    }
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'member_id', 'member_id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id', 'id');
    }
    public function locker(): BelongsTo
    {
        return $this->belongsTo(Locker::class, 'locker_no', 'locker_no');
    }

    public function lockerHistory()
    {
        return $this->hasMany(LockerHistory::class, 'member_id', 'id')->latest();
    }
    public function workouts(): BelongsToMany
    {
        return $this->belongsToMany(Workout::class, 'member_workouts', 'member_id', 'workout_id')->withPivot('status', 'created_by', 'updated_by');
    }

    public function trialSubscription()
    {
        return $this->hasOne(MemberSubscription::class, 'member_id', 'id')->latestOfMany();
    }
    public function subscription()
    {
        return $this->hasOne(SubscriptionHistory::class, 'member_id', 'id')->latestOfMany();
    }

    public function subscriptionHistory()
    {
        return $this->hasOne(SubscriptionHistory::class, 'member_id', 'id')->latestOfMany();
    }
    public function subscriptions()
    {
        return $this->hasMany(SubscriptionHistory::class, 'member_id', 'id');
    }
    public function plan()
    {
        return $this->hasOneThrough(SubscriptionPlan::class, SubscriptionHistory::class, 'member_id', 'id', 'id', 'subscription_plan_id');
    }
    public function attendance()
    {
        $month_year = request()->month_year ?? now()->format('m/Y');

        $date = \Carbon\Carbon::createFromFormat('m/Y', $month_year);

        $month = $date->month;
        $year = $date->year;


        return $this->hasMany(Attendance::class, 'member_id', 'id')->whereMonth('date', $month)->whereYear('date', $year);
    }

    public function getImageAttribute()
    {
        return $this->profile_image ? asset($this->profile_image) : asset('backend/img/avatar-1.png');
    }

    public function getExpiredDateAttribute()
    {
        // check if has subscription
        if (!$this->subscription) {
            // check if has trial subscription
            if (!$this->trialSubscription) {
                return null;
            }
            return $this->trialSubscription->trial_end_date;
        }

        if (!$this->subscription->end_date) {
            return null;
        }

        return $this->subscription->end_date;
    }

    public function getStartDateAttribute()
    {
        if (!$this->subscription) {
            // check if has trial subscription
            if (!$this->trialSubscription) {
                return null;
            }
            return $this->trialSubscription->trial_start_date;
        }
        return $this->subscription->start_date;
    }
}
