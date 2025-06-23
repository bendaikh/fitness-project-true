<?php

namespace App\Models;

use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\LiveChat\app\Models\Message;
use Modules\Media\app\Models\Media;
use Modules\Order\app\Models\Order;
use Modules\Order\app\Models\OrderReview;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'phone',
        'address',
        'status',
        'is_banned',
        'verification_token',
        'forget_password_token',
        'user_type',
        'email_verified_at',
        'gender',
        'age',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function scopeActive($query)
    {
        return $query->where('status', UserStatus::ACTIVE);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', UserStatus::DEACTIVE);
    }

    public function scopeBanned($query)
    {
        return $query->where('is_banned', UserStatus::BANNED);
    }

    public function scopeUnbanned($query)
    {
        return $query->where('is_banned', UserStatus::UNBANNED);
    }

    public function socialite()
    {
        return $this->hasMany(SocialiteCredential::class, 'user_id');
    }

    public function getImageUrlAttribute()
    {;
        $setting = cache('setting');
        $value = $this->attributes['image'];

        // check if file is exists
        if ($value && !file_exists(public_path($value))) {
            if (str_contains($value, 'https:/')) {
                $value = $value;
            } else {
                $value = $this->media?->path;
                if ($value) {
                    $value = asset($value);
                }
            }
        } else if ($value) {
            $value = asset($value);
        }
        return $value ? $value : asset($setting->default_avatar);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function member()
    {
        return $this->hasOne(Member::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function reviews()
    {
        return $this->hasMany(OrderReview::class);
    }

    public function trainer()
    {
        return $this->hasOne(Trainer::class, 'user_id', 'id');
    }

    // workout
    public function workouts()
    {
        return $this->belongsToMany(Workout::class, 'workout_enrollments', 'user_id', 'workout_id')->withPivot('status', 'created_by', 'updated_by');
    }

    public function enrollments()
    {
        return $this->hasMany(WorkoutEnrollment::class, 'user_id', 'id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
