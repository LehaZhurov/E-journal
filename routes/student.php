<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TelegramKeyController;
use Illuminate\Support\Facades\Route;

Route::post('get/rating/{page}',           [StudentController::class, 'getRating'])->name('student.getRating');
Route::get('get/hours',                    [SubjectController::class, 'getSubjectForStudent'])->name('student.getHour');
Route::post('update/code',                  [TelegramKeyController::class, 'update'])->name('student.updateCode');
Route::post('create/code',                  [TelegramKeyController::class, 'create'])->name('student.createCode');
