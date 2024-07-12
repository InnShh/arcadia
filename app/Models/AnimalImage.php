<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $animal_id
 * @property string|null $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Animal|null $animal
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalImage whereAnimalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalImage whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AnimalImage extends Model
{
    use HasFactory;
    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}
