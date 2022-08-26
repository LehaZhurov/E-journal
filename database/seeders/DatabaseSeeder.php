<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Group;
use App\Models\Subject;
use App\Models\Rating;
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
        $teachersCount = 10;
        $studentsCount = 30;
        $subjectsCount = 4;
        $studentGroupCount = 4;
        //Создание групп педагоги
        $teacherGroup = Group::factory()->state(['name' => 'Педагоги'])->create();
        //Создание ролей педагоги
        $teacherRole = Role::factory()->state(['name' => 'teacher'])->create();
        //Создание педагогов
        $teachers = User::factory()
            ->count($teachersCount)
            ->for($teacherGroup)
            ->hasAttached($teacherRole)
            ->create();
        //Создание предметов 
        $subjects = Subject::factory()
            ->state([
                'user_id' => $teachers[rand(0, $teachersCount - 1)]->id
            ])->count($subjectsCount)->create();
        //Создание группы студенты
        $studentGroup = Group::factory()->count($studentGroupCount)->hasAttached($subjects)->create();
        //Создание роли студент
        $studentRole = Role::factory()->state(['name' => 'student'])->create();
        //Создание студентов
        $students = User::factory()
            ->count($studentsCount)
            ->state([
                'group_id' => $studentGroup[rand(0, $studentGroupCount - 1)]->id
            ])
            ->hasAttached($studentRole)
            ->create();
        //Создание оценок
        for ($i = 0; $i < $studentsCount; $i++) {
            Rating::factory()
                ->count(10)
                ->state([
                    'teacher_id' => $teachers[rand(0, $teachersCount - 1)]->id,
                    'student_id' => $students[rand(0, $studentsCount - 1)]->id,
                    'subject_id' => $subjects[rand(0, $subjectsCount - 1)]->id
                ])
                ->create();
        }
        // Создание администратора на время разработки
        MoonshineUser::query()->create([
            'email' => 'leha@mail.ru',
            'name' => 'leha',
            'password' => bcrypt('lehaleha')
        ]);
    }
}
