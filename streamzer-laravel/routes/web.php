<?php

use Illuminate\Support\Facades\Route;

/* --------- FRONT OFFICE --------- */
/*** HOME ***/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

/*** CATEGORIES ***/
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/category/{category}', [App\Http\Controllers\CategoryController::class, 'category.get']);

/*** MOVIES ***/
Route::get('/movies', [App\Http\Controllers\MovieController::class, 'index'])->name('movies');
Route::get('/movies/{movie}', [App\Http\Controllers\MovieController::class, 'show'])->name('movie.get');;

/*** SERIES ***/
Route::get('/series', [App\Http\Controllers\MovieController::class, 'index'])->name('series');
Route::get('/series/{serie}', [App\Http\Controllers\MovieController::class, 'show'])->name('serie.get');

/*** EPISODES ***/
Route::get('/series/{serie_id}/{season}', [App\Http\Controllers\EpisodeController::class, 'index'])->name('episodes');
Route::get('/series/{serie_id}/{season}/{episode}', [App\Http\Controllers\EpisodeController::class, 'show'])->name('episode.get');


/* --------- BACK OFFICE --------- */

Route::prefix('admin')->group(function () {
    Auth::routes();
    Route::middleware(['auth'])->group(function () {
        Route::name('admin.')->group(function () {

            Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

            Route::get('/users', [App\Http\Controllers\UserController::class, 'usersAdmin'])->name('users');
            Route::get('/user/new', [App\Http\Controllers\UserController::class, 'createAdmin'])->name('user.new');
            
            Route::get('/movies', [App\Http\Controllers\MovieController::class, 'indexAdmin'])->name('movies');
            Route::post('/movie/new', [App\Http\Controllers\MovieController::class, 'createAdmin'])->name('movie.new');
            Route::get('/movie/{movie}', [App\Http\Controllers\MovieController::class, 'showAdmin'])->name('movie.get');
            Route::put('/movie/{movie}', [App\Http\Controllers\MovieController::class, 'updateAdmin'])->name('movie.put');
            Route::delete('/movie/{movie}', [App\Http\Controllers\MovieController::class, 'deleteAdmin'])->name('movie.delete');
            
            Route::get('/series', [App\Http\Controllers\SerieController::class, 'indexAdmin'])->name('series');
            Route::post('/serie/new', [App\Http\Controllers\SerieController::class, 'createAdmin'])->name('serie.new');
            Route::get('/serie/{serie}', [App\Http\Controllers\SerieController::class, 'showAdmin'])->name('serie.get');
            Route::put('/serie/{serie}', [App\Http\Controllers\SerieController::class, 'updateAdmin'])->name('serie.put');
            Route::delete('/serie/{serie}', [App\Http\Controllers\SerieController::class, 'deleteAdmin'])->name('serie.delete');
            
            Route::get('/seasons', [App\Http\Controllers\SeasonController::class, 'indexAdmin'])->name('seasons');
            Route::post('/season/new', [App\Http\Controllers\SeasonController::class, 'createAdmin'])->name('season.new');
            Route::get('/season/{season}', [App\Http\Controllers\SeasonController::class, 'showAdmin'])->name('season.get');
            Route::put('/season/{season}', [App\Http\Controllers\SeasonController::class, 'updateAdmin'])->name('season.put');
            Route::delete('/season/{season}', [App\Http\Controllers\SeasonController::class, 'deleteAdmin'])->name('season.delete');
            
            Route::get('/episodes', [App\Http\Controllers\EpisodeController::class, 'indexAdmin'])->name('episodes');
            Route::post('/episode/new', [App\Http\Controllers\EpisodeController::class, 'createAdmin'])->name('episode.new');
            Route::get('/episode/{episode}', [App\Http\Controllers\EpisodeController::class, 'showAdmin'])->name('episode.get');
            Route::put('/episode/{episode}', [App\Http\Controllers\EpisodeController::class, 'updateAdmin'])->name('episode.put');
            Route::delete('/episode/{episode}', [App\Http\Controllers\EpisodeController::class, 'deleteAdmin'])->name('episode.delete');
        });
    });
});




