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
 * @property int $id
 * @property string $value
 * @property int $student_id
 * @property int $teacher_id
 * @property int $subject_id
 * @property int $type_attestation_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RecordBook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecordBook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecordBook whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecordBook whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecordBook whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecordBook whereTypeAttestationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecordBook whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecordBook whereValue($value)
 */
class RecordBook extends Model
{
    use HasFactory;

    function type(){
        return $this->hasMany(TypeAttestation::class);
    }
}
