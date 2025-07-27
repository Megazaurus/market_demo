<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCharacteristic extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'value',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
