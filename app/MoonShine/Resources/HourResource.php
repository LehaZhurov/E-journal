<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;

use Leeto\MoonShine\Resources\Resource;
use Leeto\MoonShine\Fields\ID;
use App\Models\Hour;
use Leeto\MoonShine\Fields\Number;
use Leeto\MoonShine\Fields\BelongsTo;
class HourResource extends Resource
{
	public static string $model = Hour::class;

	public static string $title = 'Часы';

	public function fields(): array
	{
		return [
            ID::make()->sortable(),
            Number::make('Кол-во часов','value'),
            BelongsTo::make('Группа','group','name'),
            BelongsTo::make('Предмет','subject','name'),
            
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
