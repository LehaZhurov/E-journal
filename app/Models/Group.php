<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Group
 *
 * @package App/Models/Group
 * @property int $id
 * @property string $name - название группы
 * @property-read array $users - массив пользователей
 * @property-read array $subjects - массив предметов группы
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $subjects_count
 * @property-read int|null $users_count
 * @method static \Database\Factories\GroupFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|Group onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Group withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Group withoutTrashed()
 */

class Group extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }


    public function delete()
    {
       User::query()->where('group_id',$this->id)->delete();
       return parent::delete();
    }
}
