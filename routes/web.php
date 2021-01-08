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
    return view('pages.beranda');
});
Route::get('/blog', function () {
    return view('pages.blog');
});
Route::get('/tentang', function () {
    return view('pages.tentang');
});
Route::get('/hubungi', function () {
    return view('pages.hubungi');
});
