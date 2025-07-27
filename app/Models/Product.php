<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property float $price
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'promotion_price',
        'is_new',
        'created_at',
        'deleted_at',
        'is_available',
        'category_id',
        'description',
    ];

    protected $casts = [
        'is_new' => 'boolean',
        'is_available' => 'boolean',
        'created_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function characteristics()
    {
        return $this->hasMany(ProductCharacteristic::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function mainImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_main', true);
    }

    public function recommendations()
    {
        return $this->hasMany(ProductRecommendation::class, 'main_product_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function cartHistories()
    {
        return $this->hasMany(CartHistory::class);
    }
}
