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
Route::get('/home/verusers', 'HomeController@verUsers')->name('verUsers');
Route::get('/home/verpeople', 'HomeController@verPeople');
Route::get('/home/nuevopeople', 'HomeController@nuevoPeople');
Route::get('/home/getUserInfo', 'HomeController@getUserInfo')->name('getUserInfo');
Route::get('/home/testservice', 'HomeController@testService');
