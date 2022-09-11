<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeAttestation;
/**
 * App\Models\RecordBook
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|TypeAttestation[] $type
 * @property-read int|null $type_count
 * @method static \Database\Factories\RecordBookFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RecordBook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RecordBook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RecordBook query()
 * @mixin \Eloquent
 */
class RecordBook extends Model
{
    use HasFactory;

    function type(){
        return $this->hasMany(TypeAttestation::class);
    }
}
