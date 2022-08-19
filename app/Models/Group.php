<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Subject;
/**
 * @package App/Models/Group
 * @property int $id
 * @property string $name - название группы
 * @property-read array $users - массив пользователей
 * @property-read array $subjects - массив предметов группы
 * 
 */

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class);
    }
}
