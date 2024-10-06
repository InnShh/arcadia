<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Redis;
use Log;

/**
 * 
 *
 * @property int $id
 * @property int $exhibit_id
 * @property string|null $slug
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Exhibit|null $exhibit
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AnimalImage> $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|Animal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Animal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Animal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereExhibitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereUpdatedAt($value)
 * @property string|null $avatar_image_path
 * @property string|null $title
 * @property string|null $title_description
 * @property string|null $description
 * @property string|null $race
 * @property string|null $age
 * @property string|null $diet
 * @property string|null $consumption
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereAvatarImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereDiet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereRace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereTitleDescription($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FeedingReport> $feeds
 * @property-read int|null $feeds_count
 * @mixin \Eloquent
 */
class Animal extends Model
{
    use HasFactory;
    protected $fillable = [
        'exhibit_id',
        'slug',
        'name',
    ];
    public function images(): HasMany
    {
        return $this->hasMany(AnimalImage::class, 'animal_id');
    }
    public function exhibit(): BelongsTo
    {
        return $this->belongsTo(Exhibit::class, 'exhibit_id');
    }
    public function feeds(): HasMany
    {
        return $this->hasMany(FeedingReport::class, 'animal_id');
    }
    public function latestFeed(): HasOne
    {
        return $this->hasOne(FeedingReport::class, 'animal_id')->latest();
    }
    public function reports(): HasMany
    {
        return $this->hasMany(VetoReport::class, 'animal_id');
    }
    public function latestReport(): HasOne
    {
        return $this->hasOne(VetoReport::class, 'animal_id')->latest();
    }
    function incrementPageViews(): void
    {
        try {
            Redis::incr("animals.{$this->id}.pageloads", 1);
        } catch (\Throwable $th) {
            Log::error("Animal 'incrementPageViews': Redis error: " . $th->getMessage(), [
                "animal_id" => $this->id,
            ]);
        }
        return;
    }
    function getPageViews(): string
    {
        try {
            return Redis::get("animals.{$this->id}.pageloads") ?? '-';
        } catch (\Throwable $th) {
            Log::error("Animal 'getPageViews': Redis error: " . $th->getMessage(), [
                "animal_id" => $this->id,
            ]);
            return '-';
        }
        return '-';
    }
}
