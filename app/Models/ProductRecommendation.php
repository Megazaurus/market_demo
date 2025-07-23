<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductRecommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_product_id',
        'support_product_id',
    ];

    // 🔁 Основной товар
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'main_product_id');
    }

    // 🔁 Рекомендуемый товар
    public function recommendedProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'support_product_id');
    }
}
