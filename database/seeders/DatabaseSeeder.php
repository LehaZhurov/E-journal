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
         //Создание групп педагоги
        $this->teacherGroup = Group::factory()->state(['name' => 'Педагоги'])->create();
         //Создание ролей педагоги
        $this->teacherRole = Role::factory()->state(['name' => 'teacher'])->create();
        //Создание роли студент
        $this->studentRole = Role::factory()->state(['name' => 'student'])->create();
        $this->generateData();
        $this->generateData();
        $this->generateData();
        $this->generateData();
        // Создание администратора на время разработки
        MoonshineUser::query()->create([
            'email' => 'leha@mail.ru',
            'name' => 'leha',
            'password' => bcrypt('lehaleha')
        ]);
    }

    private function generateData(){
        //Создание педагогов
        $teachers = User::factory()
            ->count(1)
            ->for($this->teacherGroup)
            ->hasAttached($this->teacherRole)
            ->create();
        //Создание предметов 
        $subjects = Subject::factory()
            ->state([
                'user_id' => $teachers[0]->id
            ])->count(2)->create();
        //Создание группы студенты
        $studentGroup = Group::factory()->count(1)->hasAttached($subjects)->create();
        //Создание студентов
        $students = User::factory()
            ->count(30)
            ->state([
                'group_id' => $studentGroup[0]->id
            ])
            ->hasAttached($this->studentRole)
            ->create();
        //Создание оценок
        for ($i = 0; $i < 30; $i++) {
            Rating::factory()
                ->count(10)
                ->state([
                    'teacher_id' => $teachers[0]->id,
                    'student_id' => $students[rand(0, 29)]->id,
                    'subject_id' => $subjects[rand(0, 1)]->id
                ])
                ->create();
        }
    }
}
