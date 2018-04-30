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

// Admin Route
Route::get('/admin', 'AdminsController@index');

// Admin/User Route
Route::get('/admin/{user}', 'AdminsController@showUser')->where('user', '[0-9]+');

Route::get('/admin/admin/create', 'AdminsController@createAdmin');
Route::post('/admin/admin/store', 'AdminsController@storeAdmin');

Route::get('/admin/{user}/edit', 'AdminsController@editUser')->where('user', '[0-9]+');
Route::put('/admin/{user}', 'AdminsController@updateUser')->where('user', '[0-9]+');

// Admin/Event Route
Route::get('/admin/event/{event}', 'AdminsController@showEvent')->where('event', '[0-9]+');

Route::get('/admin/event/create', 'AdminsController@createEvent');
Route::post('/admin/event/store', 'AdminsController@storeEvent');

Route::get('/admin/event/{event}/edit', 'AdminsController@editEvent')->where('event', '[0-9]+');
Route::put('/admin/event/{event}', 'AdminsController@updateEvent')->where('event', '[0-9]+');

Route::delete('/admin/event/{event}', 'AdminsController@deleteEvent')->where('event', '[0-9]+');


Route::resource('/reports', 'ReportsController');

Route::get('/admin', 'AdminsController@index');
// Route::get('/events/create', function () {
//     return view('events.index');
// });

Route::resource('/events', 'EventsController');
Route::resource('/sales', 'SalesController');

Route::resource('/index', 'HomesController');
Route::resource('personal_message', 'PersonalMessagesController');



Route::get('/profile/{profile}', 'ProfilesController@edit')->where('profile', '[0-9]+');
Route::put('/profile/{profile}', 'ProfilesController@update')->where('profile', '[0-9]+');

Route::get('/shelfbook', 'ShelvesController@index');
Route::get('/shelfbook/{book}', 'ShelvesController@showBook')->where('book','[0-9]+');
Route::get('/shelfbook/create', 'ShelvesController@create');
Route::post('/shelfbook', 'ShelvesController@store');


Route::resource('/personal_message', 'PersonalMessagesController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verificationDoc/create', 'VerificationsDocController@create');
Route::post('/profile/{profile}', 'VerificationsDocController@store');

Route::get('/profile/{profile}', 'ProfilesController@edit')->where('profile', '[0-9]+');
Route::put('/profile/{profile}', 'ProfilesController@update')->where('profile', '[0-9]+');
Route::get('/profile/{profile}/sell', 'ProfilesController@showSell')->where('profile', '[0-9]+');
Route::get('/profile/{profile}/buy', 'ProfilesController@showBuy')->where('profile', '[0-9]+');

Route::get('/shelfbook', 'ShelvesController@index');
Route::get('/shelfbook/{book}', 'ShelvesController@showBook')->where('book','[0-9]+');
Route::get('/shelfbook/create', 'ShelvesController@create');
Route::post('/shelfbook', 'ShelvesController@store');
Route::post('/shelfbook/addbook', 'ShelvesController@addbook');

Route::resource('/personal_messages', 'PersonalMessagesController')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/buying/{sale}', 'SalesController@buying')->where('sale', '[0-9]+');
Route::put('/buying', 'SalesController@updatedb');
Route::put('/buying/confirmpayment/{sale}', 'SalesController@confirm')->where('sale', '[0-9]+');
Route::put('/buying/success', 'SalesController@success');
