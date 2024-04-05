<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrafoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrafoUpdateController;
use App\Http\Controllers\AdminController;
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

// Admin Route
Route::prefix('admin')->group(function (){
    Route::get('/login',[AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/owner',[AdminController::class, 'AdminLogin'])->name('admin.login');
    // Route::get('/login/admin',[AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard',[AdminController::class, 'AdminDashboard'])->name('admin.dashboard')->middleware('admin');   
});

// Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

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

Route::get('/welcome', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
