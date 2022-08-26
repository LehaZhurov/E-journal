<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use Leeto\MoonShine\Resources\Resource;
use Leeto\MoonShine\Fields\Text;
use Leeto\MoonShine\Fields\BelongsTo;

class SubjectResource extends Resource
{
	public static string $model = Subject::class;

	public static string $title = 'Предметы';

	public function fields(): array
	{
		return [
            Text::make('Название','name')->sortable(),
            BelongsTo::make('Переподователь','user','name')
        ];
	}

	public function rules(Model $item): array
	{
	    return [];
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
