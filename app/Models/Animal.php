<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Animal extends Model
{
    use HasFactory;
    public function images(): HasMany
    {
        return $this->hasMany(AnimalImage::class, 'animal_id');
    }
    public function exhibit(): BelongsTo
    {
        return $this->belongsTo(Exhibit::class, 'exhibit_id');
    }
}
