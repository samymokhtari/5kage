<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', fn() => view('pages/home'))->name('home');

Route::get('/admin-home', fn() => view('pages/admin/home'))->name('admin-home');


/*Auth::routes();*/

Route::get('/animes', [App\Http\Controllers\MovieController::class, 'index'])->name('movie');
Route::get('/animes/{id}', [App\Http\Controllers\MovieController::class, 'show']);
