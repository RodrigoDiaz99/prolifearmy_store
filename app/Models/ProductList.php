<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'price',
        'subtotal',
        'user_id',
        'folio'
    ];
    protected $table = 'product_list';

    public function product()
    {
        return $this->belongsToMany(Product::class, 'list');
    }

    public function Users(){
        return $this->belongsTo(User::class);

    }

    public function voucher(){
        return $this->belongsTo(Voucher::class, 'id', 'folio');
    }
}
