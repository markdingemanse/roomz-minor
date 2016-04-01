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

Route::get('/', function () {
    return view('welcome');
});

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

});

Route::group(['prefix'=>'/ftp'],function(){
    Route::get('/', 'Controller/ftpController@index');
    Route::post('/', 'Controller/ftpController@store');
    Route::get('/{id}', 'Controller/ftpController@show');
    Route::put('/{id}/edit', 'Controller/ftpController@edit');
    Route::delete('/{id}', 'Controller/ftpController@destroy');
});

Route::group(['prefix'=>'/dropbox'],function(){
    Route::get('/', 'Controller/dropboxController@index');
    Route::post('/', 'Controller/dropboxController@store');
    Route::get('/{id}', 'Controller/dropboxController@show');
    Route::put('/{id}/edit', 'Controller/dropboxController@edit');
    Route::delete('/{id}', 'Controller/dropboxController@destroy');
});
