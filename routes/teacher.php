<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::get('/cabinet', [TeacherController::class, 'index'])->name('teacher.cabinet');
Route::post('/create/rating', [TeacherController::class, 'createRating'])->name('teacher.createRating');
Route::post('/get/rating', [TeacherController::class, 'getRating'])->name('teacher.getRating');

