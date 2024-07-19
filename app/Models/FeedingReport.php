<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $animal_id
 * @property string|null $food
 * @property int|null $food_vol
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $details
 * @property-read \App\Models\Animal|null $animal
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\FeedingReportFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|FeedingReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedingReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedingReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedingReport whereAnimalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedingReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedingReport whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedingReport whereFood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedingReport whereFoodVol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedingReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedingReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedingReport whereUserId($value)
 * @mixin \Eloquent
 */
class FeedingReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'animal_id',
        'food',
        'food_vol',
        'details',
    ];

    /**
     * Get the user that owns the feeding report.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the animal that owns the feeding report.
     */
    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }
}
