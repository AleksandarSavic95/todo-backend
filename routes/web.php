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


// one to many obtain test
// https://laravel.com/docs/5.6/eloquent-relationships#one-to-many
Route::get('/users/{userId}/todoitems', function($userId) {
    echo App\User::find($userId)->todoItems;
});