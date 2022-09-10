<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/cabinet', [StudentController::class, 'index'])->name('student.cabinet');
Route::post('/get/rating/{page}', [StudentController::class, 'getRating'])->name('student.getRating');
