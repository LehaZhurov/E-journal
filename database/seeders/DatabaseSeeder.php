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
        //Создание предметов 
        $subjects = Subject::factory()->count($subjectsCount)->create();
        //Создание групп педагоги
        $teacherGroup = Group::factory()->state(['name' => 'Педагоги'])->create();
        // $studentGroup = Group::factory()->create();
        //Создание ролей
        $teacherRole = Role::factory()->state(['name' => 'teacher'])->create();
        $studentRole = Role::factory()->state(['name' => 'student'])->create();
        //Создание педагогов
        $teachers = User::factory()
            ->count($teachersCount)
            ->for($teacherGroup)
            ->hasAttached($teacherRole)
            ->hasAttached(Subject::factory()->count(4))
            ->create();
        //Создание студентов
        $students = User::factory()
            ->count($studentsCount)
            ->for(Group::factory()->hasAttached($subjects))
            ->hasAttached($studentRole)
            ->create();
        // Создание администратора на время разработки
        MoonshineUser::query()->create([
            'email' => 'leha@mail.ru',
            'name' => 'leha',
            'password' => bcrypt('lehaleha')
        ]);
        //Создание оценок
        for ($i=0; $i < $studentsCount; $i++) { 
            Rating::factory()
            ->count(5)
            ->state([
                'teacher_id' => $teachers[rand(0,$teachersCount-1)]->id,
                'student_id' => $students[rand(0,$studentsCount-1)]->id,
                'subject_id' => $subjects[rand(0,$subjectsCount-1)]->id
            ])
            ->create();
        }
    }
}
