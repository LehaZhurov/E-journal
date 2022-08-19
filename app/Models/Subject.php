<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Group;

/**
 * @package App/Models/Subject
 * @property int $id
 * @property string $name - название предмета
 * @property-read array $users - массив педагогов
 * @property-read array $groups - массив групп у которых есть данный предмет
 */

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
