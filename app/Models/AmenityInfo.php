<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmenityInfo extends Model
{
    use HasFactory;
    protected $table = "amenity_infos";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'option',
        'amenity_id',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function amenities()
    {
        return $this->hasMany(AmenityInfo::class, 'amenity_id');
    }

    public function amenity()
    {
        return $this->belongsTo(AmenityInfo::class, 'amenity_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
