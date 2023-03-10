<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $table = 'permissions';

    public $orderable = [
        'id',
        'title',
    ];

    public $filterable = [
        'id',
        'title',
    ];

    protected $fillable = [
        'title',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'roles_permissions');
    }
}