<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;

use Leeto\MoonShine\Resources\Resource;
use Leeto\MoonShine\Fields\ID;
use Leeto\MoonShine\Fields\Text;
use App\Models\Group;
use Leeto\MoonShine\Fields\BelongsToMany;
use Leeto\MoonShine\Filters\TextFilter; 

class GroupResource extends Resource
{
	public static string $model = Group::class;

	public static string $title = 'Группы';

	public function fields(): array
	{
		return [
            ID::make()->sortable(),
            Text::make('Название','name')->sortable(),
            BelongsToMany::make('Предметы','subjects','name')->hideOnIndex(),
            
        ];
	}

	public function rules(Model $item): array
	{
	    return [
            'name' => ['required','string']
        ];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [
            TextFilter::make('Имя', 'name'),
        ];
    }

    public function actions(): array
    {
        return [];
    }
}
