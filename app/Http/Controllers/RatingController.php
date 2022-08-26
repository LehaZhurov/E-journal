<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Rating\CreateRatingRequest;
use App\Action\Rating\CreateRatingAction;
use App\Http\Resources\Rating\RatingResource;
class RatingController extends Controller
{
    public function create(CreateRatingRequest $request){
        $rating = CreateRatingAction::execute($request->all());
        return new RatingResource($rating);
    }
}
