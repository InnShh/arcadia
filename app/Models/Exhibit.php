<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ExhibitImage> $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|Exhibit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exhibit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exhibit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Exhibit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exhibit whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exhibit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exhibit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exhibit whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exhibit whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Animal> $animals
 * @property-read int|null $animals_count
 * @property string|null $state
 * @property \Illuminate\Support\Carbon|null $state_at
 * @method static \Illuminate\Database\Eloquent\Builder|Exhibit whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exhibit whereStateAt($value)
 * @mixin \Eloquent
 */
class Exhibit extends Model
{
    use HasFactory;
    protected $casts = [
        'state_at' => 'datetime',
    ];

    protected $fillable = [
        'slug',
        'name',
        'description',
        'state_at',
        'state',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ExhibitImage::class, 'exhibit_id');
    }
    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class, 'exhibit_id');
    }
}
