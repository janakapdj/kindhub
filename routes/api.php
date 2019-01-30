<?php

use Illuminate\Http\Request;

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

Route::post('/student/create', 'StudentsController@store');
Route::get('/student/edit/{id}', 'StudentsController@edit');
Route::post('/student/update/{id}', 'StudentsController@update');
Route::delete('/student/delete/{id}', 'StudentsController@delete');
Route::get('/home', 'StudentsController@index');

Route::post('/class_room/create', 'ClassRoomsController@store');
Route::get('/class_room/edit/{id}', 'ClassRoomsController@edit');
Route::post('/class_room/update/{id}', 'ClassRoomsController@update');
Route::delete('/class_room/delete/{id}', 'ClassRoomsController@delete');
Route::get('/class_rooms', 'ClassRoomsController@index');

Route::post('/teacher/create', 'TeachersController@store');
Route::get('/teacher/edit/{id}', 'TeachersController@edit');
Route::post('/teacher/update/{id}', 'TeachersController@update');
Route::delete('/teacher/delete/{id}', 'TeachersController@delete');
Route::get('/teachers', 'TeachersController@index');