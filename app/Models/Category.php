<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'image',
        'status',
        'slug',
    ];

    public function scopeFilter(Builder $query, $filters): void
    {
        $query->when($filters['name'] ?? false, function ($query, $value) {
            $query->where('name', 'LIKE', "%$value%");
        });

        $query->when($filters['status'] ?? false, function ($query, $value) {
            $query->where('status', 'LIKE', "%$value%");
        });
    }
}
