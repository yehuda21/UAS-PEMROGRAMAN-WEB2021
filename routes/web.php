<?php

use Illuminate\Support\Facades\Route;
use App\Http\MahasiswaController;

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

Route::get('/mahasiswa', 'MahasiswaController@index');
Route::get('/mahasiswa/create', 'MahasiswaController@create');
Route::get('/pegawai/cari','MahasiswaController@cari');
Route::post('/mahasiswa', 'MahasiswaController@store');
Route::get('mahasiswa/{id}/edit', 'MahasiswaController@edit');
Route::patch('mahasiswa/{id}', 'MahasiswaController@update');
Route::get('mahasiswa/{id}/delete', 'MahasiswaController@destroy');
