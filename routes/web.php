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


Route::get('/customer/{path?}', function () {
    return view("react.index");
})->where("path", '.*');

Route::get('/user/{path?}', function () {
    return view("react.index");
})->where("path", '.*');

Route::get('/auth/{path?}', function () {
    return view("react.index");
})->where("path", '.*');

Auth::routes();

//Route::get('/home', 'CustomerHomeController@index')->name('home');
