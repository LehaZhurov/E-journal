<?php

namespace App\Http\Controllers;

use App\Action\Hour\PatchHourAction;
use App\Http\Requests\Hour\PatchHourRequest;
use App\Http\Resources\Hour\HourResource;

class HourController extends Controller
{
    public function patch(PatchHourRequest $request)
    {
        $groupId = $request->get('group');
        $subjectId = $request->get('subject');
        $hour = $request->get('hour');
        $result = PatchHourAction::execute($hour, $groupId, $subjectId);
        return new HourResource($result);
    }
}
