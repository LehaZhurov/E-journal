<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RatingController;

Route::get('/cabinet', [TeacherController::class, 'index'])->name('teacher.cabinet');
Route::post('/get/rating', [TeacherController::class, 'getRating'])->name('teacher.getRating');
Route::post('/create/rating', [RatingController::class, 'create'])->name('teacher.createRating');

