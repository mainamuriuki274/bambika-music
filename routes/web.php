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



Route::get('/admin/home','App\Http\Controllers\Admin\HomeController@index');
Route::get('/admin/album/status/{album}','App\Http\Controllers\Admin\HomeController@approve');

Route::get('/admin/album','App\Http\Controllers\Admin\AlbumsController@index');
Route::get('/admin/album/{album}', 'App\Http\Controllers\Admin\AlbumsController@create');
Route::get('/admin/album/{album}/edit', 'App\Http\Controllers\Admin\AlbumsController@edit');
Route::get('/admin/album/delete/{album}', 'App\Http\Controllers\Admin\AlbumsController@destroy');
Route::patch('/admin/album/{album}', 'App\Http\Controllers\Admin\AlbumsController@update');
Route::post('/admin/album','App\Http\Controllers\Admin\AlbumsController@store');

Route::get('/admin/song/{song}/edit', 'App\Http\Controllers\Admin\SongsController@edit');
Route::get('/admin/song/{song}', 'App\Http\Controllers\Admin\SongsController@destroy');
Route::patch('/admin/song/{song}', 'App\Http\Controllers\Admin\SongsController@update');
Route::post('/admin/song/{album}','App\Http\Controllers\Admin\SongsController@store');
