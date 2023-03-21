<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'amount'
    ];

    //Relaciones
    public function product () {
        return $this->belongsToMany(Product::class, 'sold', 'product_id', 'id');
    }
}
