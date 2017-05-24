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
    // Zmiana hasła
    Route::get('/change/password', 'HomeController@changePasswordView')->name('change.password');
    Route::post('/change/password', 'HomeController@changePassword')->name('post.password');

Route::group(['middleware' => ['constraints']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    // Wylogowanie
    Route::get('/logout', 'HomeController@logout')->name('logout');
    

    // Routing kontrolera użytkowników
    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/users/block/{id}', 'UserController@blockUser')->name('block.user');
    Route::get('/users/force/{id}', 'UserController@forcePassword')->name('force.user');

    // Routing kontrolera projektów
    Route::get('/projects', 'ProjectController@index')->name('projects');
    Route::get('/projects/new', 'ProjectController@showProject')->name('project.add');
    Route::get('/projects/edit/{id}', 'ProjectController@showProject')->name('project.edit');
    Route::post('/projects/save', 'ProjectController@saveProject')->name('project.save');
    Route::get('/projects/delete/{id}', 'ProjectController@deleteProject')->name('project.delete');
    Route::get('/projects/adduser/{id}/{project}', 'ProjectController@addUser')->name('project.addUser');
    Route::post('/projects/hint/{id}', 'ProjectController@hintUser')->name('project.hintUser');
    Route::get('/projects/deluser/{id}', 'ProjectController@deleteUser')->name('project.delUser');

    // Routing kontrola zadań
    Route::get('/tasks', 'TaskController@index')->name('tasks');

    // Routing kontrola wpisów
    Route::get('/comments', 'CommentController@index')->name('comments');
    Route::get('/comments/new/{id}', 'CommentController@showNewComment')->name('comment.add');
    Route::get('/comments/edit/{id}', 'CommentController@showComment')->name('comment.edit');
    Route::post('/comments/save', 'CommentController@saveComment')->name('comment.save');
});