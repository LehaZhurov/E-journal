<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\HourController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RecordBookController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('cabinet', [TeacherController::class, 'index'])->name('teacher.cabinet');
Route::post('get/rating', [TeacherController::class, 'getRating'])->name('teacher.getRating');
Route::post('create/rating', [RatingController::class, 'create'])->name('teacher.createRating');
Route::post('update/rating', [RatingController::class, 'update'])->name('teacher.updateRating');
Route::post('delete/rating', [RatingController::class, 'delete'])->name('teacher.deleteRating');
Route::get('get/hours', [SubjectController::class, 'getSubjectForTeacher'])->name('teacher.getHour');
Route::get('get/subjects_group/{groupId}', [GroupController::class, 'getSubjects'])->name('teacher.getSubjectsForGroup');
Route::get('get/users_group/{groupId}', [GroupController::class, 'getUsers'])->name('teacher.getUsersForGroup');
Route::post('patch/hour', [HourController::class, 'patch'])->name('teacher.patchHour');
Route::post('create/attestation', [RecordBookController::class, 'create'])->name('teacher.createRecord');
Route::get('get/attestation/{groupId}', [RecordBookController::class, 'attestationGroup'])->name('teacher.getRecordGroup');
Route::get('delete/attestation/{id}', [RecordBookController::class, 'delete'])->name('teacher.deleteRecord');
Route::post('create/report', [ReportController::class, 'create'])->name('teacher.createReport');
Route::get('download/report/{url}', [ReportController::class, 'download'])->name('teacher.downloadReport');
Route::post('get/report', [ReportController::class, 'get'])->name('teacher.getReport');
