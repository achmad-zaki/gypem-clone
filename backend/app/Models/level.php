<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class level extends Model
{
    protected $fillable = [
        'name',
    ];
    public function events(): BelongsToMany
{
    return $this->belongsToMany(Event::class);
}
}
