<?php

use App\Http\Controllers\ExhibitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ReviewController;

Route::get('/', [HomePageController::class, 'index'])->name('homepage');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Auth::routes();
Route::get('/{exhibit:slug}', [ExhibitController::class, 'show'])->name('exhibits.show');
// Route::get('/savanna', fn () => view('savannapage'))->name('savanna');
Route::get('/savanna/giraffe-max', fn () => view('giraffemaxpage'))->name('giraffemax');
// Route::get('/forest', fn () => view('forestpage'))->name('forest');
// Route::get('/arctic', fn () => view('arcticpage'))->name('arctic');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
