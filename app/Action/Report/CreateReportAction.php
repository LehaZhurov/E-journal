<?php
namespace App\Action\Report;

use App\Models\Report;

class CreateReportAction
{

    public static function execute(string $name, string $path, int $groupId, string $year): Report
    {
        $report = new Report();
        $report->name = $name;
        $report->path = $path;
        $report->group_id = $groupId;
        $report->year = $year;
        $report->save();
        return $report;
    }

}
