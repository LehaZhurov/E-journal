<?php
namespace App\Queries\Report;

use App\Models\Report;
use Illuminate\Database\Eloquent\Collection;

class GetReportsQuery
{

    public static function find(int $groupId, string $year): Collection
    {
        $reports = Report::query()
            ->where('group_id', $groupId)
            ->where('year', $year)
            ->get();
        return $reports;
    }

}
