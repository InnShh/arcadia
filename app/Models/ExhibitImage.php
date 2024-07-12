<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $exhibit_id
 * @property string|null $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Exhibit|null $exhibit
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitImage whereExhibitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitImage whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExhibitImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ExhibitImage extends Model
{
    use HasFactory;
    public function exhibit(): BelongsTo
    {
        return $this->belongsTo(Exhibit::class, 'exhibit_id');
    }
}
