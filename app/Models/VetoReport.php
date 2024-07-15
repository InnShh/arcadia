<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @method static \Database\Factories\VetoReportFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|VetoReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VetoReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VetoReport query()
 * @property int $id
 * @property int $animal_id
 * @property int $user_id
 * @property string|null $visit_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $details
 * @method static \Illuminate\Database\Eloquent\Builder|VetoReport whereAnimalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VetoReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VetoReport whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VetoReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VetoReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VetoReport whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VetoReport whereVisitDate($value)
 * @property-read \App\Models\Animal|null $animal
 * @property-read \App\Models\User|null $veto
 * @mixin \Eloquent
 */
class VetoReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'animal_id',
        'user_id',
        'visit_date',
        'details',
    ];
    public function veto(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}
