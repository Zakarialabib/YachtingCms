<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
   use HasAdvancedFilter;
   
   public const TYPE_SALE = "sale";
   public const TYPE_FAQ = "faq";
   public const TYPE_PRIVACY = "privacy";

    public $orderable = [
      'id',
      'title',
      'content',
      'type',
      'status'
    ];

    public $filterable = [
      'id',
      'title',
      'content',
      'type',
      'status'
    ];

    protected $fillable = [
    'title',
    'content', 
    'type', 
    'status'
    ];

}