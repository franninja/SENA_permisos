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

//rutas para login de redes sociales
Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

// para obtener los uploads de cualquier modelo
Route::get('/upload/file/{disk}/{filename}', 'UploadController@getFile')->name('upload.file');
Route::get('/upload/delete/{disk}/{filename}', 'UploadController@deleteFile')->name('upload.delete');

// home controller - dashboard
Route::get('/home', 'HomeController@index')->name('home');

// rutas usuarios
Route::get('user/{user}/role', 'UserController@role')->middleware('can:user.role')->name('user.role');
Route::patch('user/saverole', 'UserController@saveRole')->middleware('can:user.saverole')->name('user.saverole');
Route::resource('user', 'UserController')->except(['store', 'create']);

// rutas roles
Route::resource('roles', 'RoleController');

// rutas desafios o Challenges
Route::post('challenge/changtestatus/{id}', 'ChallengeController@changteStatus')->name('challenge.changtestatus');
Route::post('challenge/{id}', 'ChallengeController@update')->name('challenge.update');
Route::resource('challenge','ChallengeController')->except(['update']);

// rutas areas para los desafios
Route::resource('area','AreasController');

// rutas Idea
Route::resource('idea','IdeaController');




