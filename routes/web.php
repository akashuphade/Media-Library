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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routes for media
Route::get('media/upload', 'MediaController@getUploadView');
Route::post('media/upload', 'MediaController@uploadMedia');
Route::get('media/{id}/edit', 'MediaController@editUploadedMedia');

//Images route
Route::get('media/images', 'MediaController@getImages');
Route::get('media/image/{id}', 'MediaController@getImageById');
Route::delete('media/image/{id}', 'MediaController@deleteImage');
Route::get('media/image/{id}/edit', 'MediaController@editImage');
Route::put('media/image/{id}', 'MediaController@updateImage');

//Documents Route
Route::get('media/documents', 'MediaController@getDocuments');
Route::get('media/document/{id}', 'MediaController@getDocumentById');
Route::delete('media/document/{id}', 'MediaController@deleteDocument');
Route::get('media/document/{id}/edit', 'MediaController@editDocument');
Route::put('media/document/{id}', 'MediaController@updateDocument');


//Download media
Route::get('media/download/{id}', 'MediaController@downloadMedia');
