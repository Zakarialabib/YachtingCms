<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Support\HasAdvancedFilter;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasAdvancedFilter;

    public $orderable = [
        'id',
        'phone' ,
         'email',
         'address', 
         'password',
         'photo'
    ];

    public $filterable = [
        'id',
        'phone' ,
         'email',
         'address', 
         'password',
         'photo'
    ];

    protected $fillable = [
         'name', 
        'phone' ,
         'email',
         'address', 
         'password',
         'roles.title',
         'photo'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    public $active = 1;

    public $inactive = 0;

    public function generateToken()
    {
        $this->api_token = str_random(20);
        $this->save();

        return $this->api_token;
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function isAdmin() {
        return $this->roles->pluck('title')->contains(Role::ROLE_ADMIN);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function returns()
    {
        return $this->hasMany(Returns::class);
    }

    public function boats() {
        return $this->hasMany(Boat::class);
    }


}
