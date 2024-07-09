<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
