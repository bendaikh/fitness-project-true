<?php

namespace App\Models;

use App\Traits\UpdateGenericClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Locker extends Model
{
    use HasFactory, UpdateGenericClass;
    protected $table = 'lockers';
    protected $fillable = [
        'locker_no', 'availability', 'status', 'created_by', 'updated_by',
    ];
    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
    public function member(): HasOne
    {
        return $this->hasOne(Member::class, 'locker_no', 'locker_no');
    }

    public function lockerHistory()
    {
        return $this->hasMany(LockerHistory::class, 'locker_id', 'id')->latest();
    }
    public function lockerLatest()
    {
        return $this->hasOne(LockerHistory::class, 'locker_id', 'id')->latest();
    }
}
