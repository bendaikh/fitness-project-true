<?php

namespace Modules\Wallet\app\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Wallet\Database\factories\WalletHistoryFactory;

class WalletHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): WalletHistoryFactory
    {
        //return WalletHistoryFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'name', 'email', 'image');
    }
}
