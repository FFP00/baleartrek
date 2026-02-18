<?php

use App\Http\Controllers\ProfileController;

use App\Models\Municipality;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\CommentController;
use App\Http\Controllers\Web\InterestingPlaceController;
use App\Http\Controllers\Web\MunicipalityController;
use App\Http\Controllers\Web\TrekController;
use App\Http\Controllers\Web\MeetingController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('users', UserController::class);
Route::resource('comments', CommentController::class);
Route::resource('interesting_places', InterestingPlaceController::class);
Route::resource('municipality', MunicipalityController::class);
Route::resource('treks', TrekController::class);
Route::resource('meetings', MeetingController::class);

require __DIR__.'/auth.php';
