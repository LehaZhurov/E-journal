<?php

namespace App\Exel;

use App\Models\User;
use App\Queries\Report\GetRatingsOfReportForMounthQuery;
use Illuminate\Support\Collection as SupportCollection;

class RatingsGroupForMonthReport extends BaseReport
{

    protected $numDays = [];
    protected $subjectNames = [];
    protected $groupId;
    protected $numMonth;
    protected $yaer;
    protected $students = [];

    public function generatigReport(int $groupId, string $numMonth, string $yaer): array 
    {
        $this->groupId = $groupId;
        $this->numMonth = $numMonth;
        $this->yaer = $yaer;
        $reportData = $this->getReportData();
        $this->month = $this->getNameMounthForNum($numMonth);
        $this->students = $reportData['users'];
        $this->studentAmout = count($this->students);
        //Вывод месяца
        $this->drawMonth($this->month);
        //Вывод кол-ва студентов
        $this->drawAmountStudents($this->studentAmout);

        $numStudent = 0;
        foreach ($this->students as $student) {
            //Вывод студентов
            $this->drawStudent($numStudent, $student);
            //Вывод пропусков
            $this->drawAbsenteeisms($numStudent, $student->absenteeisms);
            //Вывод оценок
            $this->drawRating($numStudent, $student->ratings);
            $numStudent++;

        }
        $subjects = [];
        //Выделение списка предметов
        foreach ($this->students[0]->ratings as $subject => $value) {
            $subjects[] = $subject;
        }
        $this->drawSubject($subjects);
        $nameFile = "Ведомость" . $reportData['group']->group_name . "-" . $this->month . "-" . $this->yaer . "(" . date('Y-m-dH:i:s') . ")";
        $path = $this->save($this->spreadsheet, $nameFile);
        return [
            'name' => $nameFile,
            'path' => $path
        ];
    }
    public function drawRating(int $numStudent, $ratings): void
    {
        $columnLetter = ["E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S"];
        $startNum = 6;
        $numLine = $startNum + $numStudent;
        $numRating = 0;
        foreach ($ratings as $subject => $rating) {
            $cor = $columnLetter[$numRating] . $numLine;
            $this->draw($cor, $rating->value);
            $numRating++;
        }
    }

    //Вывод пропусков
    public function drawAbsenteeisms(int $numStudent, $absenteeisms): void
    {
        $startNum = 6;
        $numLine = $startNum + $numStudent;
        $letter = "U";
        $cor = $letter . $numLine;
        $this->draw($cor, $absenteeisms['all_absentees']);
        $letter = "V";
        $cor = $letter . $numLine;
        $this->draw($cor, $absenteeisms['grand_absenteeisms']);
        $letter = "W";
        $cor = $letter . $numLine;
        $this->draw($cor, $absenteeisms['past_absenteeisms']);
    }

    public function drawSubject(array $subjects): void
    {
        $stringNum = 3;
        $columnLetter = ["E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S"];
        $countSubject = count($subjects);
        for ($i = 0; $i < $countSubject; $i++) {
            $cor = $columnLetter[$i] . $stringNum;
            $this->draw($cor, $subjects[$i]);
        }
    }

    public function drawStudent(int $numStudent, User $student): void
    {
        $startNum = 6;
        $letter = "D";
        $numLine = $startNum + $numStudent;
        $cor = $letter . $numLine;
        $this->draw($cor, $student->name);
    }

    public function draw(string $cor, $value): void
    {
        $sheet = $this->spreadsheet->getActiveSheet();
        $sheet->setCellValue($cor, $value);
    }

    public function drawAmountStudents(int $amount): void
    {
        $sheet = $this->spreadsheet->getActiveSheet();
        $sheet->setCellValue('F33', $amount);
    }

    public function drawMonth(string $month): void
    {
        $sheet = $this->spreadsheet->getActiveSheet();
        $sheet->setCellValue('C2', $month);
    }
    public function drawYear(string $year): void
    {
        $sheet = $this->spreadsheet->getActiveSheet();
        $sheet->setCellValue('R2', $year);
    }
    protected function getReportData(): SupportCollection
    {
        return GetRatingsOfReportForMounthQuery::find(
            $this->groupId,
            $this->numMonth,
            $this->yaer
        );
    }

    public static function create(int $groupId, string $numMonth, string $yaer): array
    {
        return (new self())->generatigReport($groupId, $numMonth, $yaer);
    }

}
