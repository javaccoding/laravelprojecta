<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {return view('welcome');});

Route::get('/dashboard', function () {return view('admin/index2');});


Route::resource('student', \App\Http\Controllers\Admin\StudentController::class);



Route::resource('teacher',\App\Http\Controllers\Admin\TeacherController::class);
Route::resource('teacher',\App\Http\Controllers\Admin\TeacherController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/photo',\App\Http\Controllers\Admin\PhotoController::class);
Route::resource('/user',\App\Http\Controllers\Admin\UserController::class);
