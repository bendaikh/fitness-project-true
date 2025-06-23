<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LockerHistory extends Model
{
    use HasFactory;

    protected $table = 'locker_histories';
    protected $fillable = [
        'locker_id', 'member_id', 'assign_date', 'return_date', 'created_by', 'updated_by',
    ];

    public function locker()
    {
        return $this->belongsTo(Locker::class, 'locker_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
}
