<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Leeto\MoonShine\Resources\Resource;
use Leeto\MoonShine\Fields\ID;
use Leeto\MoonShine\Fields\Text;
use Leeto\MoonShine\Fields\Email;
use Leeto\MoonShine\Fields\Password;
use Leeto\MoonShine\Fields\PasswordRepeat;
use Leeto\MoonShine\Fields\BelongsToMany;


class UserResource extends Resource
{
	public static string $model = User::class;

	public static string $title = 'Пользователи';

	public function fields(): array
	{
		return [
            Text::make('ФИО','name')->sortable(),
            BelongsToMany::make('Роль', 'role', 'name'),
            Email::make('e-mail','email')->sortable(),
            Password::make('Пароль','password')->hideOnIndex(),
            PasswordRepeat::make('Повторите пароль','repeat_password')->hideOnIndex(),
        ];
	}

	public function rules(Model $item): array
	{
	    return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email','unique:users'],
            'password' => ['sometimes','nullable','min:6','required_with:repeat_password','same:password'],
        ];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [];
    }
}
