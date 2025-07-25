<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ProductImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'src_img',
        'is_main'];
    protected $casts = [
        'is_main'=> 'bolean'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
