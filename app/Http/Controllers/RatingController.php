<?php

namespace App\Http\Controllers;

use App\Action\Rating\CreateRatingAction;
use App\Action\Rating\DeleteRatingAction;
use App\Action\Rating\UpdateRatingAction;
use App\Http\Requests\Rating\CreateRatingRequest;
use App\Http\Requests\Rating\DeleteRatingRequest;
use App\Http\Requests\Rating\UpdateRatingRequest;
use App\Http\Resources\Rating\RatingResource;

class RatingController extends Controller
{
    public function create(CreateRatingRequest $request): RatingResource
    {
        $rating = CreateRatingAction::execute($request->all());
        return new RatingResource($rating);
    }
    public function update(UpdateRatingRequest $request): RatingResource
    {
        $rating = UpdateRatingAction::execute($request->get('rating_id'), $request->get('value'));
        return new RatingResource($rating);
    }
    public function delete(DeleteRatingRequest $request): bool
    {
        $result = DeleteRatingAction::execute($request->get('rating_id'));
        return $result;
    }
}
