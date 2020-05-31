<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/kapcsolat', function () {
    return view('contact');
})->name('contact');

Route::get('/profile', function () {
    return view('profile', ['user' => Auth::user()]);
})->middleware('auth')->name('profile');

// Main pages
Route::get('/oktato',                'TeacherController@index'       )        ->name('teacher');
Route::get('/hallgato',              'StudentController@index'       )        ->name('student');

// New Subject
Route::get('/targy-modositas',         'TeacherController@indexSubjectAdd'    )      ->name('create-subject');
Route::post('/targy-modositas',        'TeacherController@storeSubject'       )      ->name('store-subject');

// Edit Subject
Route::get('targy-modositas/{code}',   'TeacherController@indexSubjectEdit'   )      ->name('edit-subject');
Route::post('targy-modositas/{code}',   'TeacherController@updateSubject'      )      ->name('update-subject');

// Delete Subject
Route::post('targy-torles',            'TeacherController@deleteSubject'      )      ->name('delete-subject');

// Get Subject
Route::get('/{code}',                'TeacherController@getSubject'  )        ->where(['code' => '^IK-[A-Z]{3}[0-9]{3}'])->name('subject');

// Toggle Subject pulicity
Route::post('/oktato/{code}',                'TeacherController@togglePublicity'  )    ->name('toggle-publicity');

// Subject drop
Route::post('/lead',                    'StudentController@drop'  )                      ->name('drop');

// Subject assign
Route::get('/targyfelvetel',             'StudentController@indexAssign')          ->name('assign-list');
Route::post('/felvesz',                   'StudentController@assign')               ->name('assign');

// New Task
Route::get('/{code}/feladat-modositas',          'TeacherController@indexTaskAdd')           ->where(['code' => '^IK-[A-Z]{3}[0-9]{3}'])->name('create-task');
Route::post('/{code}/feladat-modositas',          'TeacherController@storeTask')           ->where(['code' => '^IK-[A-Z]{3}[0-9]{3}'])->name('store-task');

// Edit Task
Route::get('/{code}/feladat-modositas/{id}',          'TeacherController@indexTaskEdit')           ->where(['code' => '^IK-[A-Z]{3}[0-9]{3}'])->name('edit-task');
Route::post('/{code}/feladat-modositas/{id}',          'TeacherController@updateTask')           ->where(['code' => '^IK-[A-Z]{3}[0-9]{3}'])->name('update-task');

// Get Task
Route::get('/{code}/feladat/{id}',                       'TeacherController@getTask')           ->where(['code' => '^IK-[A-Z]{3}[0-9]{3}'])->name('task');

// Get Solution
Route::get('/{code}/megoldas/{id}',                    'TeacherController@getSolution')           ->where(['code' => '^IK-[A-Z]{3}[0-9]{3}'])->name('solution');

// Correct Solution
Route::post('/{code}/megoldas/{id}',                   'TeacherController@correctSolution')                    ->where(['code' => '^IK-[A-Z]{3}[0-9]{3}'])->name('correct');

// Get file download
Route::get('/download/{id}',                                      'TeacherController@downloadFile')               ->name('download');

// Solve a task
Route::get('/{code}/feladat/{id}/megoldas',                           'StudentController@getSolution')                ->where(['code' => '^IK-[A-Z]{3}[0-9]{3}'])->name('solve');
Route::post('/{code}/feladat/{id}/megoldas',                           'StudentController@storeSolution')                ->name('store-solve');

// Student task list
Route::get('/feladataim',                                             'StudentController@indexTasks')                        ->name('my-tasks');

Auth::routes();


