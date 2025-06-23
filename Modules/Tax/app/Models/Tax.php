<?php

namespace Modules\Tax\app\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tax\Database\factories\TaxFactory;

class Tax extends Model
{
    use HasFactory;

    protected $table = 'taxes';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'rate',
        'status',
        'is_default',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
