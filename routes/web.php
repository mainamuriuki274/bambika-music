<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/admin/album','App\Http\Controllers\Admin\AlbumsController@store');
Route::get('/admin/home','App\Http\Controllers\Admin\AlbumsController@index');
Route::get('/admin/album/{album}/edit', 'App\Http\Controllers\Admin\AlbumsController@edit');
Route::patch('/admin/album/{album}', 'App\Http\Controllers\Admin\AlbumsController@update');


