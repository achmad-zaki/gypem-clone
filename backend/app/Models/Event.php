<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'deskripsi',
        'category',
        'level',
        'start_date',
        'end_date',
        'poster',
        'slug',
        'price',
    ];

    public function category(): BelongsTo
    {
    return $this->belongsTo(Category::class);
     }
     public function levels(): BelongsToMany
{
    return $this->belongsToMany(Level::class);
}
}
