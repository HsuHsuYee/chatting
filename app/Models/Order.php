<?php

namespace App\Models;

use Faker\Provider\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'category_id', 'sub_category_id', 'qty', 'carModel', 'price','payment_screenshot','carBrand', 'madeIn', 'totalPrice', 'status', 'payment_id', 'phone', 'address'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
