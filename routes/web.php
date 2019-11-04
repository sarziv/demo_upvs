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
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home','HomeController@index')->name('home');

//Admin routes
Route::get('/admin','AdminController@index')->name('admin.index');
Route::post('/admin/register','AdminController@register')->name('admin.register');
Route::post('/admin/assign/{orderId}','AdminController@assignOrder')->name('admin.assignOrder');

//Tech routes
Route::get('/tech','TechController@index')->name('tech.index');
Route::post('/tech/complete/{assignedId}','TechController@complete')->name('tech.complete');
Route::post('/tech/assign/{orderId}','TechController@assignOrder')->name('tech.assignOrder');

//User routes
Route::get('/user','UserController@index')->name('user.index');
Route::post('/user/create','UserController@create')->name('user.create');
