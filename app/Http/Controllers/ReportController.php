<?php

namespace App\Http\Controllers;

use App\Exel\RatingsGroupForMonthReport;
use App\Http\Requests\Report\CreateReportRequest;
use Illuminate\Support\Facades\Storage;
use App\Action\Report\CreateReportAction;
use App\Http\Resources\Report\ReportResource;
class ReportController extends Controller
{
    public function create(CreateReportRequest $request){
        $groupId = $request->get('group');
        $month = $request->get('month');
        $year = $request->get('year');
        //Создаем сам отчет
        $report = RatingsGroupForMonthReport::create($groupId, $month, $year);
        $path = Storage::disk('public')->url($report['path']);
        //Создаем запись в БД о созданном отчете
        $report = CreateReportAction::execute($report['name'],$path,$groupId,$year);
        return new ReportResource($report);
    }
    
   
        
}
