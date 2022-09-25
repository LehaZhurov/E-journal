<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Group;
use App\Models\Hour;
use App\Models\Rating;
use App\Models\Role;
use App\Models\Subject;
use App\Models\User;
use App\Models\TypeAttestation;
use Illuminate\Database\Seeder;
use Leeto\MoonShine\Models\MoonshineUser;
use Illuminate\Database\Eloquent\Collection;
use Database\Factories\SubjectFactory;
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
        $this->studentOut   = Group::factory()->state(['name' => 'Выбывшие'])->create();
        //Создание ролей педагоги
        $this->teacherRole = Role::factory()->state(['name' => 'teacher'])->create();
        //Создание роли студент
        $this->studentRole = Role::factory()->state(['name' => 'student'])->create();
        $this->createTypeAttention();
        $this->generateTestData();

        // Создание администратора на время разработки
        MoonshineUser::query()->create([
            'email' => 'leha@mail.ru',
            'name' => 'leha',
            'password' => bcrypt('lehaleha'),
        ]);
    }
    private function createTypeAttention(){
        TypeAttestation::factory()->state(['name' => 'Экзамен'])->create();
        TypeAttestation::factory()->state(['name' => 'Зачет'])->create();
        TypeAttestation::factory()->state(['name' => 'Дифзачет'])->create();
    }

    //Возврощате id созданного учителя
    private function createTeacher(): int
    {
        $teacher = User::factory()
            ->for($this->teacherGroup)
            ->hasAttached($this->teacherRole)
            ->create();
        print('Педагог '.$teacher->name.' создан').PHP_EOL;
        return $teacher->id;
    }
    //Возврощает колекцию студентов
    private function createStudents(int $count, int $groupId):Collection
    {
        $students = User::factory()
            ->count($count)
            ->state([
                'group_id' => $groupId,
            ])
            ->hasAttached($this->studentRole)
            ->create();
        print('Группа студентов создана').PHP_EOL;
        print('Кол-во:'.$count).PHP_EOL;
        print('groupId:'.$groupId).PHP_EOL;
        return $students;
    }
    //Создает предеметы
    private function createSubjects(int $teacherId, int $count):SubjectFactory
    {
        $subjects = Subject::factory()
            ->state([
                'user_id' => $teacherId,
            ])->count($count);
        return $subjects;
    }
    //Создает группу для студентов
    private function createStudentGroup($subjects): int
    {
        $studentGroup = Group::factory()->has($subjects)->create();
        print('Группа '.$studentGroup->name.' создана').PHP_EOL;
        return $studentGroup->id;
    }
    //создание часов для предметов
    private function createHour(int $subjectId, int $studentGroupId) : Hour
    {

        $hour = Hour::factory()->state([
            'subject_id' => $subjectId,
            'group_id' => $studentGroupId,
        ])->create();
        print('Часы созданы').PHP_EOL;
        print('Значение:'.$hour->id).PHP_EOL;
        print('subjectId:'.$subjectId).PHP_EOL;
        print('studentGroupId:'.$studentGroupId).PHP_EOL;
        return $hour;
    }

    private function createRating(int $teacherId, int $subjectId, int $studentId, int $count): void
    {
        print('Созадние оценок кол-во:'.$count).PHP_EOL;
        for ($i = 0; $i < $count; $i++) {
            $rating = Rating::factory()
                ->state([
                    'teacher_id' => $teacherId,
                    'student_id' => $studentId,
                    'subject_id' => $subjectId,
                ])
                ->create();
            print('Оценка создана').PHP_EOL;
            print('Значение:'.$rating->value).PHP_EOL;
            print('teacherId:'.$teacherId).PHP_EOL;
            print('subjectId:'.$subjectId).PHP_EOL;
            print('studentId:'.$subjectId).PHP_EOL;
        }
    }

    private function generateTestData()
    {
        $subjectsCount = 2;
        $studentsCount = 20;
        for ($i = 0; $i < 1; $i++) {
            print('Начало круга генерации номер:'.$i).PHP_EOL;
            $teacherId = $this->createTeacher();
            //Кол-во групп у которых будет вести преподователь
            for($f = 0; $f < 2 ; $f ++){
                $subjects = $this->createSubjects($teacherId, $subjectsCount);
                $groupId = $this->createStudentGroup($subjects);
                $subjects = Subject::query();
                $subjectsCountForDB = $subjects->count();
                $subjects = $subjects->get();
                $students = $this->createStudents($studentsCount, $groupId);
                for($j = 0; $j < $studentsCount; $j++){
                    $subjectId = $subjects[rand(0,$subjectsCountForDB -1)]->id;
                    print($subjectId);
                    $studentId = $students[$j]->id;
                    $ratings = $this->createRating($teacherId,$subjectId,$studentId,3);
                }
                for($k = 0; $k < $subjectsCountForDB; $k++){
                    $subjectId = $subjects[$k]->id;
                    $hours = $this->createHour($subjectId,$groupId);
                }
            }
        }
    }
}
