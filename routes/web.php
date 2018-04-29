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
    return view('home.index');
});

Route::get('/admin', 'AdminsController@index');
Route::get('/admin/show/user/{user}', 'AdminsController@showUser');
// Route::get('/events/create', function () {
//     return view('events.index');
// });

// Route::resource('/admin', 'AdminsController');

Route::resource('/events', 'EventsController');

Route::resource('/index', 'HomesController');

Route::resource('personal_message', 'PersonalMessagesController');