<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'UserController@register'); //route untuk registrasi user baru
Route::post('login', 'UserController@login'); //route untuk login user


Route::group(['middleware' => 'jwt.verify'], function () { //middleware untuk verifikasi jwt
    Route::get('semuauser', 'UserController@getAllUser'); //route lihat semua user
    Route::get('user', 'UserController@getAuthenticatedUser'); //route lihat current user
    Route::put('user/{id}','UserController@changeUserData'); //route ganti data user

    Route::get('semuasosmed', 'SocMedController@daftarSosmed'); //
    Route::post('tambahsosmed', 'SocMedController@store');
    Route::put('editsosmed/{id}','SocMedController@update');
    Route::delete('hapussosmed/{id}', 'SocmedController@destroy');
});
