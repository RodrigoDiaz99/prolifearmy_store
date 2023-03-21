<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'total'
    ];

    //Relaciones
    public function product () {
        return $this->belongsToMany(Product::class,'sold');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
