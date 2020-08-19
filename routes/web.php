<?php

use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('clear', function () {
    $exitCode[0] = Artisan::call('cache:clear');
    $exitCode[1] = Artisan::call('view:clear');
    $exitCode[2] = Artisan::call('config:clear');
    $exitCode[3] = Artisan::call('clear-compiled');
    dd($exitCode);
});

Route::get('link', function () {
    $exitCode[0] = Artisan::call('storage:link');
    dd($exitCode);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('fields', 'FieldController');
    Route::resource('course', 'CourseController');
    Route::resource('lesson', 'LessonController');

    Route::get('users-lessons', 'UserLessonController@index')->name('users.lessons');
    Route::get('users-lessons/{id}', 'UserLessonController@edit')->name('users.lessons.edit');
    Route::post('users-lessons/{id}', 'UserLessonController@add')->name('users.lessons.add');
    Route::get('users-lessons/{lesson_id}/view', 'UserLessonController@view')->name('users.lessons.view');
});
