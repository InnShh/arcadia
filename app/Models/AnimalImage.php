<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnimalImage extends Model
{
    use HasFactory;
    public function exhibit(): BelongsTo
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}
