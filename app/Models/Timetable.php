<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $day_of_week
 * @property string|null $opening_time
 * @property string|null $closing_time
 * @property-read string $day_of_week_human
 * @method static \Illuminate\Database\Eloquent\Builder|Timetable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Timetable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Timetable query()
 * @method static \Illuminate\Database\Eloquent\Builder|Timetable whereClosingTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timetable whereDayOfWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timetable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timetable whereOpeningTime($value)
 * @mixin \Eloquent
 */
class Timetable extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected static function boot()
    {
        parent::boot();
        static::creating(fn ($model) => false );
        static::deleting(fn ($model) => false );
    }
    public function delete()
    {
        throw new \Exception("Timetables cannot be deleted.");
    }
    public function getDayOfWeekHumanAttribute(): string
    {
        $days = [
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday'
        ];

        return $days[$this->day_of_week];
    }
}
