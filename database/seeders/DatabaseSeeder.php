<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Group;
use App\Models\Subject;
use Leeto\MoonShine\Models\MoonshineUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Создание предметов 
        $subject = Subject::factory()->count(4)->create();
        //Создание групп педагоги
        $teacherGroup = Group::factory()->state(['name' => 'Педагоги'])->create();
        // $studentGroup = Group::factory()->create();
        //Создание ролей
        $teacherRole = Role::factory()->state(['name' => 'teacher'])->create();
        $studentRole = Role::factory()->state(['name' => 'student'])->create();
        //Создание педагогов
        User::factory()
            ->count(10)
            ->for($teacherGroup)
            ->hasAttached($teacherRole)
            ->hasAttached(Subject::factory()->count(4))
            ->create();
        //Создание студентов
        User::factory()
            ->count(30)
            ->for(Group::factory()->hasAttached($subject))
            ->hasAttached($studentRole)
            ->create();
        // Создание администратора на время разработки
        MoonshineUser::query()->create([
            'email' => 'leha@mail.ru',
            'name' => 'leha',
            'password' => bcrypt('lehaleha')
        ]);
    }
}
