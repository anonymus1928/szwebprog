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
})->name('kapcsolat');

Route::get('/profile', function () {
    return view('profile', ['user' => Auth::user()]);
})->middleware('auth')->name('profile');

// Main pages
Route::get('/oktato',                'TeacherController@index'       )        ->name('teacher');
//Route::get('/hallgato',            'StudentController@index'       )        ->name('student');

// New Subject
Route::get('/targy-modositas',         'TeacherController@indexAdd'    )      ->name('create-subject');
Route::post('/targy-modositas',        'TeacherController@store'       )      ->name('store-subject');

// Edit Subject
Route::get('targy-modositas/{code}',   'TeacherController@indexEdit'   )      ->name('edit-subject');
Route::post('targy-modositas/{code}',   'TeacherController@update'      )      ->name('update-subject');

// Delete Subject
//Route::post('targy-torles',            'TeacherController@delete'      )      ->name('delete-subject');

// Get Subject
Route::get('/{code}',                'TeacherController@getSubject'  )        ->where(['code' => '^IK-[A-Z]{3}[0-9]{3}'])->name('subject');

// Toggle Subject pulicity
Route::post('/oktato/{code}',                'TeacherController@togglePublicity'  )    ->name('toggle-publicity');

Auth::routes();


