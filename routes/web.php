<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\controllers\DesafioController;
use Illuminate\Http\controllers\IdeaController;


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

// home controller - dashboard
// para obtener los uploads de cualquier modelo
Route::get('/home/file/{disk}/{filename}', 'HomeController@getFile')->name('home.file');
Route::get('/home', 'HomeController@index')->name('home');

// rutas usuarios
Route::get('user/{user}/role', 'UserController@role')->middleware('can:user.role')->name('user.role');
Route::patch('user/saverole', 'UserController@saveRole')->middleware('can:user.saverole')->name('user.saverole');
Route::resource('user', 'UserController')->except(['store', 'create']);

// rutas roles
Route::resource('roles', 'RoleController');

// rutas desafios o Challenges
Route::resource('challenge','ChallengeController');

// rutas areas para los desafios
Route::resource('area','AreasController');

// rutas Idea
Route::resource('ideas','IdeaController');

Route::resource('desafios' , 'DesafioController');




