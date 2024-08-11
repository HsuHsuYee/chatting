<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'rate', 'feedback'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
