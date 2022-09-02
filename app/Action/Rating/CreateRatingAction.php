<?php
namespace App\Action\Rating;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
class CreateRatingAction{
        
    public static function execute(array $data) : Rating 
    {
        $teacherId = Auth::user()->id;
        $rating = Rating::query()
        ->where('student_id',$data['user_id'])
        ->where('num_day',$data['num_day'])
        ->where('num_month',$data['num_month'])
        ->where('year',$data['year']);
        if($rating->exists()){
            return $rating->first();
        }
        $rating = new Rating();
        $rating->student_id = $data['user_id'];
        $rating->teacher_id = $teacherId;
        $rating->subject_id = $data['subject_id'];
        $rating->num_day = $data['num_day'];
        $rating->num_month = $data['num_month'];
        $rating->year = $data['year'];
        $rating->value = $data['value'];
        $rating->save();
        return $rating;
    }    
        
}