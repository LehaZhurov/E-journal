<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

Route::get('/cabinet',                      [StudentController::class, 'index'])->name('student.cabinet');
Route::post('/get/rating/{page}',           [StudentController::class, 'getRating'])->name('student.getRating');
Route::get('/get/hours',                    [SubjectController::class, 'getSubjectForStudent'])->name('teacher.getHour');
