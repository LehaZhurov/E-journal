<?php

namespace App\Models;

use App\Models\Group;
use App\Models\User;
use App\Models\Hour;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Subject
 *
 * @package App/Models/Subject
 * @property int $id
 * @property string $name - название предмета
 * @property-read array $groups - массив групп у которых есть данный предмет
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $groups_count
 * @property-read User|null $user
 * @method static \Database\Factories\SubjectFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subject query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereUserId($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|Subject onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Subject whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Subject withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Subject withoutTrashed()
 */

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function hours(){
        return $this->belongsToMany(Hour::class);
    }
}
