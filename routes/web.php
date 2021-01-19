<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HubungiController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\TentangController;
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

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'detail'])->name('blogSlug');

Route::get('/promo', [PromoController::class, 'index'])->name('promo');
Route::get('/promo/{slug}', [PromoController::class, 'detail'])->name('promoSlug');

Route::match(['get', 'post'], '/hubungi', [HubungiController::class, 'index'])->name('hubungi');
