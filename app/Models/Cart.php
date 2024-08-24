<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'product_id', 'category_id', 'sub_category_id', 'qty', 'carModel', 'price', 'images', 'carBrand', 'madeIn', 'totalPrice'
    ];
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
