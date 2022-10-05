<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TelegramKey
 *
 * @property int $id
 * @property int $user_id
 * @property string $chat_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TelegramKeyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TelegramKey newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelegramKey newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelegramKey query()
 * @method static \Illuminate\Database\Eloquent\Builder|TelegramKey whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelegramKey whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelegramKey whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelegramKey whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelegramKey whereUserId($value)
 * @mixin \Eloquent
 */
class TelegramKey extends Model
{
    use HasFactory;
}
