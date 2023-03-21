<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\MyResetPassword;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'second_name',
        'first_last_name',
        'second_last_name',
        'email',
        'password',
        'delivery_data_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

   /* public function sendPasswordResetNotification($token)
{
    $this->notify(new MyResetPassword($token));
}*/
    // Relaciones
    public function deliveryData () {
        return $this->belongsToMany(DeliveryData::class);
    }

    public function promotion () {
        return $this->hasOne(Promotion::class);
    }

    public function report () {
        return $this->hasOne(Report::class);
    }

    public function wishList () {
        return $this->hasOne(WishList::class);
    }

    public function vouchers () {
        return $this->hasMany(Voucher::class);
    }

    public function comments () {
        return $this->hasMany(CommentProduct::class);
    }

    public function scoreProduct () {
        return $this->hasOne(scoreProduct::class);
    }

    public function promotions () {
        return $this->belongsToMany(Promotion::class);
    }

    public function shopingCart() {
        return $this->belongsTo(ShopingCart::class);
    }
public function product_list(){
    return $this->hasMany(ProductList::class);

}

}
