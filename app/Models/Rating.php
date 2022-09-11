<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Rating
 *
 * @package App/Models/Role
 * @property int $id
 * @property int $value - оценка
 * @property string $num_day - номер дня
 * @property string $num_month - номер месяца
 * @property string $year - год
 * @property-read array $teacher - педагог который поставил оценку
 * @property-read array $subject - предмет по которому поставили оценку
 * @property-read array $student - студент которому поставили оценку
 * @property int $student_id
 * @property int $teacher_id
 * @property int $subject_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $student_count
 * @property-read int|null $subject_count
 * @property-read int|null $teacher_count
 * @method static \Database\Factories\RatingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereNumDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereNumMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereYear($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|Rating onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Rating withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Rating withoutTrashed()
 */
class Rating extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function teacher()
    {
        return $this->hasMany(User::class, 'teacher_id');
    }

    public function student()
    {
        return $this->hasMany(User::class, 'student_id');
    }

    public function subject()
    {
        return $this->hasMany(Subject::class, 'subject_id');
    }
}
