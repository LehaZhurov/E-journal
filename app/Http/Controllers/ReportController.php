<?php

namespace App\Http\Controllers;

use App\Exel\RatingsGroupForMonthReport;
use App\Http\Requests\Report\CreateReportRequest;
use App\Http\Requests\Report\GetReportRequest;
use Illuminate\Support\Facades\Storage;
use App\Action\Report\CreateReportAction;
use App\Http\Resources\Report\ReportResource;
use App\Queries\Report\GetReportsQuery;
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
    
    public function get(GetReportRequest $request){
        $groupId = $request->get('group');
        $year = $request->get('year'); 
        $reports = GetReportsQuery::find($groupId,$year);
        return ReportResource::collection($reports);
    }
   
    public function download($url){
        dd(Storage::allFiles());  
    }
        
}
