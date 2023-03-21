<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'subtotal'
    ];

    // Relaciones
    public function user (){
        return $this->hasOne(User::class);
    }
    public function products()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
