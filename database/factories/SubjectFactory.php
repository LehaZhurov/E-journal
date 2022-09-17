<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(
                ['Математика','Русский язык','Информатика','ТВиМС',
                'Элементы вышей математики','Физкультура','ОПА',
                'Основы права','Трудовое право','МДК 02.01','Гидравлика',
                'Материаловедение','Электроные измерения','Электротехника',
                'Метрология','Английский язык','Французкий язык','Семейное право',
                'ПДД']),
            'user_id' => User::factory()
        ];
    }
}
