<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $role = null;
    // if (Auth::check()) {
    //     $role = Auth::user()->role()->first()->name;
    // } else {
    //     return view('auth.login');
    // }
    // if ($role == 'teacher') {
    //     return redirect('/teacher/cabinet');
    // } elseif ($role == 'student') {
    //     return 'Кабинет студента';
    // }else{
    //     return view('auth.login');
    // }
    return "Index";
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
