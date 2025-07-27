<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CartProductHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'count',
        'price',
        'cart_history_id',
    ];

    public function cartHistory(): BelongsTo
    {
        return $this->belongsTo(CartHistory::class);
    }

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
