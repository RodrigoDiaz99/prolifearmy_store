<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colores extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'color',
    ];


    public function productos()
    {
        return $this->belongsToMany(Product::class, 'coloreables');
        //return $this->morphedByMany(Product::class, 'coloreables');
    }
}
