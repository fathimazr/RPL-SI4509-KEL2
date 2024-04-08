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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/register', [UserController::class, 'create'])->name('register'); 
Route::post('/register', [UserController::class, 'store']);

// Route for displaying the edit form
Route::get('/trafo/edit', [TrafoController::class, 'edit'])->name('trafo.edit');

// Route for processing the form update
Route::post('/trafo', [TrafoController::class, 'update'])->name('trafo.update');

// routing untuk trafo --> pake resource biar lebih ringkas
Route::resource('trafo', TrafoController::class)->middleware('auth');

Route::get('/trafo-register', function () {
    return view('trafo.register-trafo');
});

Route::get('/trafo-register-submit', function () {
    return view('trafo.submit-register-trafo');
});

Route::get('/new', function () {
    return view ('register-new-user/register-new-user');
});

Route::get('/profile', function () {
    return view ('register-new-user/profile');
});


require __DIR__.'/auth.php';
