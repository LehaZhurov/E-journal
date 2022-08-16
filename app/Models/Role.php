<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * @package App/Models/Role
 * @property int $id
 * @property string $name - название роли
 * @property-read array $users - массив пользователей
 */


class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
