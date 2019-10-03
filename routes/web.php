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

Route::Resource('/dashboard', 'DashboardController');
Route::Resource('/dashboard', 'UserController');

Route::get('/home', 'HomeController@index')->name('home');
<<<<<<< HEAD
Route::get('/opdrachten', 'DashboardController@showAssignments')->name('ShowAssignments');
Route::get('/opdrachten/delete/', 'DashboardController@destroyAssignment')->name('delete');
=======
Route::get('/opdrachten', 'DashboardController@showAssignments');
// Route::get('/dashboard', 'DashboardController@userAssignments');
>>>>>>> 16d7e7336742ab8bc3d696ea904f27ef9b228295
Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard', 'UserController@index');
