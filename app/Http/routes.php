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

/**
 * @store -> FtpController function store
 * @show -> FtpController function show
 * @edit -> FtpController function edit
 * @destroy -> FtpController function destroy
 */

Route::group(['prefix'=>'/ftp'],function(){
    Route::post('/', 'Ftp\FtpController@store');
    Route::get('/{id}', 'Ftp\FtpController@show');
    Route::put('/{id}/edit', 'Ftp\FtpController@edit');
    Route::delete('/{id}', 'Ftp\FtpController@destroy');
});
/**
 * @store -> DropboxControlle function store
 * @show -> DropboxControlle function show
 * @edit -> DropboxControlle function edit
 * @destroy -> DropboxControlle function destroy
 */
Route::group(['prefix'=>'/dropbox'],function(){
    Route::get('/', 'Dropbox\DropboxController@index');
    Route::post('/', 'Dropbox\DropboxController@store');
    Route::get('/{id}', 'Dropbox\DropboxController@show');
    Route::put('/{id}/edit', 'Dropbox\DropboxController@edit');
    Route::delete('/{id}', 'Dropbox\DropboxController@destroy');
});
