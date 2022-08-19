<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Subject;
/**
 * @package App/Models/Role
 * @property int $id
 * @property int $value - оценка
 * @property string $num_day - номер дня
 * @property string $num_month - номер месяца
 * @property string $year - год
 * @property-read array $teacher - педагог который поставил оценку
 * @property-read array $subject - предмет по которому поставили оценку
 * @property-read array $student - студент которому поставили оценку
 * 
 */
class Rating extends Model
{
    use HasFactory;

    public function teacher(){
        return $this->hasMany(User::class,'teacher_id');
    }

    public function student(){
        return $this->hasMany(User::class,'student_id');
    }

    public function subject(){
        return $this->hasMany(Subject::class,'subject_id');
    }
}
