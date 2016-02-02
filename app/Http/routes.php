<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::auth();

	Route::get('/', ['as' => 'home' , 'uses' => 'TasksController@getHome']);
	Route::model('task', 'BCG\Models\Task');
	Route::get('update/{task}', ['as' => 'task.update', 'uses' => 'TasksController@getUpdate']);
	Route::get('delete/{task}', ['as' => 'task.delete', 'uses' => 'TasksController@getDelete']);
	Route::post('create', ['as' => 'task.create', 'uses' => 'TasksController@postCreate']);
});
