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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', 'AdminController@index')->name('home');
    Route::resource('/admin/roles', 'AdminRolesController');
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/courses', 'AdminCoursesController');
    Route::resource('/admin/departments', 'AdminDepartmentsController');
    Route::resource('/admin/programs', 'AdminProgramsController');
    Route::resource('/admin/students', 'AdminStudentsController');
    Route::resource('/admin/faculties', 'AdminFacultiesController');
});
