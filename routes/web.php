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


/**
 * Accueil une fois authentifié
 */

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Fin accueil
 */


/**
 * liste des routes pour l'authentification
 */

//Auth::routes();
//Route::auth();

Route::post('/logout','Auth\LoginController@logout')->name('logout');

Route::post('/login','Auth\LoginController@login');

Route::get('/login','Auth\LoginController@showLoginForm')->name('login');

Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');

Route::post('register','Auth\RegisterController@register');

/**
 * Fin authentification
 */

/**
 * Route accessible pour User ou admin
 */

Route::get('/files','FileController@index');

/**
 *
 */


/**
 * Routes accessible seulement par l'admin
 */

Route::get('/admin/users','UserController@index');

Route::patch('/admin/users/{user}','UserController@userToAdmin');

Route::delete('/admin/users/{user}','UserController@destroy');

Route::get('/admin/comments','CommentController@index');

Route::delete('/admin/comment/{comment}','CommentController@destroy');

Route::get('/file/create', 'FileController@create');

Route::post('/upload','FileController@store');

Route::delete('/admin/file/{file}','FileController@destroy');

/**
 * Fin des routes pour l'admin
 */

/**
 * Routes accessible seulement par le User
 */

Route::get('/user/profile/{user}','UserController@show');

Route::patch('/user/profile/{user}','UserController@updateProfile');

Route::patch('/user/password/{user}','UserController@modifyPersonalInformation');

Route::patch('/user/profile/password/{user}','UserController@updatePassword');

Route::get('/user/comment/create','CommentController@create');

Route::post('/user/comment','CommentController@store');

/**
 * Fin des routes pour le User
 */
