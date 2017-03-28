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

Route::group(['middleware' => ['constraints']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    // Wylogowanie
    Route::get('/logout', 'HomeController@logout')->name('logout');
    // Zmiana hasła
    Route::get('/change/password', 'HomeController@index')->name('change.password');

    // Routing kontrolera użytkowników
    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/users/block/{id}', 'UserController@blockUser')->name('block.user');
    Route::get('/users/force/{id}', 'UserController@forcePassword')->name('force.user');

    // Routing kontrolera projektów
    Route::get('/projects', 'ProjectController@index')->name('projects');
});