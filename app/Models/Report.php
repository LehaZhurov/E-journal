<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Report
 *
 * @property int $id
 * @property string $name
 * @property string $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report query()
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $group_id
 * @property string $year
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereYear($value)
 */
class Report extends Model
{
    use HasFactory;
}
