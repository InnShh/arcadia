<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;

Route::get('/', [HomePageController::class, 'index'])->name('homepage');
Route::get('/savanna', fn () => view('savannapage'))->name('savanna');
Route::get('/savanna/giraffe-max', fn () => view('giraffemaxpage'))->name('giraffemax');
Route::get('/forest', fn () => view('forestpage'))->name('forest');
Route::get('/arctic', fn () => view('arcticpage'))->name('arctic');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
