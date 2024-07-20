<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalImageController;
use App\Http\Controllers\ExhibitController;
use App\Http\Controllers\ExhibitImageController;
use App\Http\Controllers\FeedingReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VetoReportController;

Route::get('/', [HomePageController::class, 'index'])->name('homepage');
Route::post('/send-message', [HomePageController::class, 'sendMessage'])->name('homepage.sendmessage');
Route::post('/load-more-animals', [HomePageController::class, 'loadMoreAnimals'])->name('homepage.load-more-animals');
Route::resource('/reviews', ReviewController::class)->only(['store']);
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/users', UserController::class);
    Route::resource('/activities', ActivityController::class);
    Route::resource('/exhibits', ExhibitController::class)->except(['show']);
    Route::resource('/exhibit-images', ExhibitImageController::class);
    Route::resource('/animals', AnimalController::class)->except(['show']);
    Route::resource('/animal-images', AnimalImageController::class);
    Route::resource('/veterinary-reports', VetoReportController::class);
    Route::resource('/feeding-reports', FeedingReportController::class);
    Route::get('/timetables', [TimetableController::class, 'index'])->name('timetables.index');
    Route::post('/timetables', [TimetableController::class, 'update'])->name('timetables.update');
    Route::resource('/reviews', ReviewController::class)->except(['store']);
    Route::post('/reviews/{review}/approve', [ReviewController::class, 'approve'])->name('reviews.approve');
    Route::post('/reviews/{review}/reject', [ReviewController::class, 'reject'])->name('reviews.reject');
});
Auth::routes();

Route::get('/{exhibit:slug}/{animal:slug}', [AnimalController::class, 'show'])->name('animals.show');
Route::get('/{exhibit:slug}', [ExhibitController::class, 'show'])->name('exhibits.show');
