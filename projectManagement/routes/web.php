<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\PdfController;
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
    return view('layouts.application');
});
Route::get('/project/create','ProjectController@index')->name('project.create');
Route::post('/project/submit','ProjectController@createProject')->name('project.submit');

Route::get('/task/create','TaskController@index')->name('task.create');
Route::post('/task/submit','TaskController@createTask')->name('task.submit');

Route::get('/taskSummary','TaskController@summary')->name('taskSummary');
Route::post('/generateReport','TaskController@getReport')->name('generateReport');

Route::get('/projectTask','WorkController@index')->name('projectTask');
Route::post('/assignTask','WorkController@taskAssign')->name('assignTask');

Route::get('/addTaskRow','WorkController@addRow')->name('addTaskRow');
Route::post('/addNewRow','WorkController@addnewRow')->name('addNewRow');

Route::get('/downloadPDF/{id}/{sdate}/{edate}/{type}','PdfController@PDFdownload')->name('downloadPDF');
Route::get('/barChart','ChartController@viewChart')->name('barChart');