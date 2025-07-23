<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'count',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    // 🔁 Покупка принадлежит пользователю
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 🔁 Покупка относится к конкретному товару
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
