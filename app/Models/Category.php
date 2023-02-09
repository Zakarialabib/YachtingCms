<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name', 'feature_title'];

    protected $table = 'categories';
     
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
        'slug', 
        'priority', 
        'is_feature', 
        'feature_title', 
        'image', 
        'icon_map_marker', 
        'color_code', 
        'type', 
        'status', 
        'seo_title', 
        'seo_description'
    ];

    protected $casts = [
        'priority' => 'integer',
        'is_feature' => 'integer',
        'status' => 'integer'
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_DEACTIVE = 0;

    const IS_FEATURE = 1;

    const TYPE_PLACE = "place";
    const TYPE_OFFER = "offer";
    const TYPE_POST = "post";
    const TYPE_BOAT = "boat";

    public function place_type()
    {
        return $this->hasMany(PlaceType::class, 'category_id', 'id');
    }

    public function category_type()
    {
        return $this->hasMany(CategoryType::class, 'category_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function places()
    {
        return $this->hasMany(Place::class, 'category');
    }
    
    public function getListAll($type)
    {
        $categories = self::query()
            ->where('type', $type)
            ->orderBy('priority', 'asc')
            ->get();

        return $categories;
    }

    public function scopeStatus($query)
    {
        $query->where('status', 1);
    }

    public function boats()
    {
        return $this->hasMany(Boat::class);
    }

}
