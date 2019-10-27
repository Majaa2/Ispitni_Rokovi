<?php

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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PagesController@index')->name('pages.index');
Route::get('/rokovi', 'PagesController@rokovi')->name('pages.rokovi');
Route::get('/admin', 'UsersController@admin')->name('admin');
Route::post('/login/custom', 'LoginController@login')->name('login.custom');

Route::resource('exams', 'ExamsController');
Route::post('/exams/edit', 'ExamsController@edit')->name('exam.edit');
Route::post('/exams/update/{id}', 'ExamsController@update')->name('exam.update');
Route::get('/exams/delete/{id}', 'ExamsController@delete')->name('exam.delete');
Route::post('/exams/create', 'ExamsController@store')->name('exam.create');

Route::get('/search', 'ExamsController@search')->name('exams.search');
Route::resource('users', 'UsersController');
Route::get('/registriraj', 'UsersController@show')->name('users.reg');
Route::get('/users', 'UsersController@index')->name('users.index');
Route::post('/users/create', 'UsersController@store')->name('users.create');
Route::post('/users/edit', 'UsersController@edit')->name('user.edit');
Route::post('/users/update/{id}', 'UsersController@update')->name('user.update');
Route::get('/users/delete/{id}', 'UsersController@delete')->name('user.delete');


Route::resource('studies', 'StudiesController');
Route::post('/studies/create', 'StudiesController@store')->name('studies.create');
Route::get('/study/delete/{id}', 'StudiesController@delete')->name('study.delete');


Route::resource('subjects', 'SubjectsController');
Route::post('/subjects/edit', 'SubjectsController@edit')->name('subject.edit');
Route::post('/subjects/update/{id}', 'SubjectsController@update')->name('subject.update');
Route::get('/subjects/delete/{id}', 'SubjectsController@delete')->name('subject.delete');
Route::post('/subjects/create', 'SubjectsController@store')->name('subject.create');
