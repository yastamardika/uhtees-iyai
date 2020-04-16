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

// Route::get('users', 'UserController@index'); //lihat semua user

// Route::post('users', 'UserController@store'); //store new user

// Route::delete('users/{id}', 'UserController@destroy'); //delete user

// Route::put('users/{id}', 'UserController@update'); //modify user data

// Route::get('users/{id}', 'UserController@perid'); //lihat user per id

// Route::get('socmed','SocMedController@index'); //lihat socmed user

// Route::post('socmed','SocMedController@store'); //store new socmed

// Route::get('socmed/{id}','SocMedController@perid'); //lihat socmed per id

// Route::put('socmed/{id}','SocMedController@update'); //modify socmed data per id

// Route::delete('socmed/{id}','SocMedController@destroy'); //delete socmed id
