<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Voucher extends Model
{
    use HasFactory;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'folio';

    protected $fillable = [
        'user_id',
        'expense',
        'delivery_id',
        'status'
    ];

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function product_lists()
    {
        return $this->hasMany(ProductList::class, 'folio', 'id');
    }

    public function delivery_data()
    {
        return $this->hasOne(DeliveryData::class);
    }
}
