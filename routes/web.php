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

//Image route
Route::get('media/images', 'MediaController@getImages');
Route::get('media/image/{id}', 'MediaController@getImageById');
Route::delete('media/image/{id}', 'MediaController@deleteImage');
Route::get('media/image/{id}/edit', 'MediaController@editImage');
Route::put('media/image/{id}', 'MediaController@updateImage');

//Document Route
Route::get('media/documents', 'MediaController@getDocuments');
Route::get('media/document/{id}', 'MediaController@getDocumentById');
Route::delete('media/document/{id}', 'MediaController@deleteDocument');
Route::get('media/document/{id}/edit', 'MediaController@editDocument');
Route::put('media/document/{id}', 'MediaController@updateDocument');

//Audio Route
Route::get('media/audios', 'MediaController@getAudios');
Route::get('media/audio/{id}', 'MediaController@getAudioById');
Route::delete('media/audio/{id}', 'MediaController@deleteAudio');
Route::get('media/audio/{id}/edit', 'MediaController@editAudio');
Route::put('media/audio/{id}', 'MediaController@updateAudio');

//Video Route
Route::get('media/videos', 'MediaController@getVideos');
Route::get('media/video/{id}', 'MediaController@getVideoById');
Route::delete('media/video/{id}', 'MediaController@deleteVideo');
Route::get('media/video/{id}/edit', 'MediaController@editVideo');
Route::put('media/video/{id}', 'MediaController@updateVideo');

//Embed Video Route
Route::get('media/embed', 'MediaController@getEmbedView');
Route::post('media/embed', 'MediaController@embedMedia');
Route::get('media/embedded', 'MediaController@getEmbeddedVideos');
Route::get('media/embedded/{id}', 'MediaController@getEmbeddedVideoById');
Route::delete('media/video/{id}', 'MediaController@deleteVideo');
Route::get('media/video/{id}/edit', 'MediaController@editVideo');
Route::put('media/video/{id}', 'MediaController@updateVideo');


//Download media
Route::get('media/download/{id}', 'MediaController@downloadMedia');
