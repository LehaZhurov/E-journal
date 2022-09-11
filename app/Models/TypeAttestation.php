<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TypeAttestation
 *
 * @method static \Database\Factories\TypeAttestationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAttestation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAttestation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAttestation query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAttestation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAttestation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAttestation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeAttestation whereUpdatedAt($value)
 */
class TypeAttestation extends Model
{
    use HasFactory;
}
