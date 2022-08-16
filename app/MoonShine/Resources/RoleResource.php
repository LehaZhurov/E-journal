<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use Leeto\MoonShine\Resources\Resource;
use Leeto\MoonShine\Fields\ID;
use Leeto\MoonShine\Fields\Text;

class RoleResource extends Resource
{
	public static string $model = Role::class;

	public static string $title = 'Роли';

	public function fields(): array
	{
		return [
            Text::make('Название','name')->sortable(),
        ];
	}

	public function rules(Model $item): array
	{
	    return [
            'name' => ['required','string'],
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
