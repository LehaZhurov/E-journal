<?php

namespace App\Exel;

use App\Queries\Report\GetRatingsOfReportForMounthQuery;

class RatingsGroupForMonthReport extends BaseReport
{

    protected $numDays = [];
    protected $subjectNames = [];
    protected $groupId;
    protected $numMonth;
    protected $yaer;
    protected $reportData;

    public function startGeneratigReport(int $groupId, string $numMonth, string $yaer)
    {
        $this->groupId = $groupId;
        $this->numMonth = $numMonth;
        $this->yaer = $yaer;
        $this->reportData = $this->getReportData();
        dd($this->reportData['users'][0]);
    }

    protected function getReportData()
    {
        return GetRatingsOfReportForMounthQuery::find(
            $this->groupId,
            $this->numMonth,
            $this->yaer
        );
    }

    public static function create(int $groupId, string $numMonth, string $yaer)
    {
        return (new self())->startGeneratigReport($groupId, $numMonth, $yaer);
    }

}
