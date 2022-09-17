<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Hour
 *
 * @property int $id
 * @property int $value
 * @property int $group_id
 * @property int $subject_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\HourFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Hour newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hour newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hour query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hour whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hour whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hour whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hour whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hour whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hour whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hour whereValue($value)
 * @mixin \Eloquent
 * @property-read Group|null $group
 * @property-read Subject|null $subject
 * @property-read User|null $user
 */
class Hour extends Model
{
    use HasFactory;

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
