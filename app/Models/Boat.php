<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    use HasFactory;
    protected $table = "boats";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'address',
        'guests',
        'cabins',
        'single_beds',
        'double_beds',
        'bathrooms',
        'number_of_engines',
        'power_per_motor',
        'gallons_per_hour',
        'year_factory_boat',
        'captained',
        'status',
        'booking_type',
        'price',
        'boat_size',
        'nbr_comment',
        'photo_path',
        'ratio',
        'user_id',
        'category_id',
        'country_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function scopeStatus($query)
    {
        $query->where('status', 1);
    }

    public function images()
    {
        return $this->hasMany(Images::class, 'boat_id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'boat_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }
}
