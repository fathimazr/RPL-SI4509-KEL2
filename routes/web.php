<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrafoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrafoUpdateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/trafo-data', function () {
    return view('trafo-data');
})->middleware(['auth', 'verified'])->name('trafo-data');

Route::get('/add-performance', function () {
    return view('trafo.add-performance');
});

// Route for view data trafo
Route::get('/view-performance', function () {
    return view('trafo.view-performance');
})->middleware(['auth', 'verified'])->name('view-performance');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/register', [UserController::class, 'create'])->name('register'); 

Route::get('/check-email', [UserController::class, 'check_email'])->name('check-email');
Route::get('/reset-password', [UserController::class, 'reset_password'])->name('reset-password');
Route::get('/reset-password-complete', [UserController::class, 'reset_password_comp'])->name('reset-password-complete');
Route::post('/register', [UserController::class, 'store']);

// Route for displaying the edit form
Route::get('/trafo/edit', [TrafoController::class, 'edit'])->name('trafo.edit');

// Route for processing the form update
Route::post('/trafo', [TrafoController::class, 'update'])->name('trafo.update');

// routing untuk trafo --> pake resource biar lebih ringkas
Route::resource('trafo', TrafoController::class)->middleware('auth');



require __DIR__.'/auth.php';
