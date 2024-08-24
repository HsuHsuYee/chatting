<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 'sub_category_id', 'stock', 'carModel', 'price', 'images', 'carBrand', 'madeIn'
    ];

    protected $casts = [
        'images' => 'array',
    ];
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategories()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
}
