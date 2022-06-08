<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AjaxreqController;
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

Route::get('/user/dashboard','UserController@viewDashboard')->name('user.dashboard');
Route::get('/user/array','UserController@showArray')->name('user.arrayShow');

Route::get('/user/list','UserController@userlist')->name('user.list');
Route::post('/user/search','UserController@searchUser')->name('user.search');

Route::get('/address/district/{id}','RegisterController@getDistrict')->name('address.district');
Route::get('/address/thana/{id}','RegisterController@getThana')->name('address.thana');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
