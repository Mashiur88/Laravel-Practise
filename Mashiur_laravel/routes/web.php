<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AjaxreqController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PageController;
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
    return view('dashBoard');
});

//Route::get('/changstat/{id}/{stat}/{btn}','AjaxreqController@reqhandle')->name('change.status');
Route::post('/changstat/','AjaxreqController@reqhandle')->name('change.status');

Route::get('/about','PageController@viewAbout')->name('about');
Route::get('/gallery','PageController@viewGallery')->name('gallery');
Route::post('/gallery/upload',[PageController::class,'uploadPhoto'])->name('upload');

Route::get('/user/dashboard','UserController@viewDashboard')->name('user.dashboard');
Route::get('/user/array','UserController@showArray')->name('user.arrayShow');

Route::get('/user/list','UserController@userlist')->name('user.list');
Route::post('/user/search','UserController@searchUser')->name('user.search');

Route::post('/address/modal','UserController@showModal')->name('address.modal');
//Route::get('/address/modal/{id}','UserController@showModal')->name('address.modal');

//Route::get('/edit/district/{id}', 'UserController@editDistrict')->name('edit.district');
Route::post('/edit/district', 'UserController@editDistrict')->name('edit.district');

//Route::get('/edit/thana/{id}', 'UserController@editThana')->name('edit.thana');
Route::post('/edit/thana', 'UserController@editThana')->name('edit.thana');

Route::get('user/delete/{id}','UserController@deleteUser')->name('user.delete');

Auth::routes();
Route::get('/address/district/{id}',[RegisterController::class,'getDistrict'])->name('address.district');
Route::get('/address/thana/{id}',[RegisterController::class,'getThana'])->name('address.thana');

Route::get('user/edit/{id}',[UserController::class,'editUser'])->name('user.edit');
Route::post('user/update/',[UserController::class,'updateUser'])->name('user.update');

Route::get('/home', 'HomeController@index')->name('home');