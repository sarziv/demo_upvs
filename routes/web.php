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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home/admin/register','AdminController@register')->name('admin.register');

Route::get('/home','AdminController@assign')->name('admin.assign');

Route::post('/home/admin/assign/{orderId}','AdminController@assignOrder')->name('admin.assignOrder');

