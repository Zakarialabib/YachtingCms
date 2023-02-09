<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    const STATUS_ACTIVE = 1;
    const STATUS_DEACTIVE = 0;
    const DEFAULT = 1;

    public $orderable = [
        'id',
        'name',
        'description'
    ];

    public $filterable = [
        'id',
        'name',
        'description'
    ];

    protected $fillable = [
        'name', 'slug','description'
    ];

    protected $hidden = [];

    protected $casts = [
        'category_id' => 'integer'
    ];

    
    public function getFullList()
    {
        return self::query()
            ->where('status', self::STATUS_ACTIVE)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}