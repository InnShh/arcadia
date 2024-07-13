<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ExhibitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ReviewController;

Route::get('/', [HomePageController::class, 'index'])->name('homepage');
Route::post('/load-more-animals', [HomePageController::class, 'loadMoreAnimals'])->name('homepage.load-more-animals');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Auth::routes();
Route::get('/{exhibit:slug}', [ExhibitController::class, 'show'])->name('exhibits.show');
Route::get('/savanna/giraffe-max', fn () => view('giraffemaxpage'))->name('giraffemax');
Route::get('/{exhibit:slug}/{animal:slug}', [AnimalController::class, 'show'])->name('animals.show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
