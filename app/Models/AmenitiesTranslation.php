<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class AmenitiesTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'activity',
        'nav_safety',
        'entertainment',
        'comfort',
    ];
}