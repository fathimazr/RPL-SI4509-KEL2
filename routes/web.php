<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrafoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrafoUpdateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DataEntryController;
use App\Http\Controllers\StatisticController;

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

// Admin Middleware
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.adm-dash')->middleware(['auth', 'verified']);
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware(['auth', 'verified']);
    Route::get('/trafo-data', [TrafoController::class, 'index'])->middleware(['auth', 'verified'])->name('trafo-data');
    Route::get('/new', [UserController::class, 'create'])->middleware(['auth', 'verified'])->name('register-user');
    Route::post('/new', [UserController::class, 'store'])->middleware(['auth', 'verified'])->name('admin.regist');
});

Route::get('/data-entry', [DataEntryController::class, 'create'])->name('data-entry.create');
Route::post('/data-entry', [DataEntryController::class, 'store'])->name('data-entry.store');
Route::get('/trafo-city', function () {
    return view('data-entry.trafo-city');
});
Route::get('/branch-office', function () {
    return view('data-entry.employee-branch-office');
});

Route::middleware(['auth', 'role:tim_teknis,manager'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/trafo-data', [TrafoController::class, 'index']);

    Route::get('/maps', [TrafoController::class, 'pin'])->middleware(['auth', 'verified'])->name('maps');
    Route::get('/maps/on', [TrafoController::class, 'pin_color'])->middleware(['auth', 'verified'])->name('maps_color');
    Route::get('/trafo/{id}', [TrafoController::class, 'show'])->name('trafo.show');
    Route::get('/add-performance', function () {
        return view('trafo.add-performance');
    });

    // Route for view data trafo
    // Route::get('/view-performance', [TrafoController::class, 'show'])->middleware(['auth', 'verified'])->name('view-performance');
   
    
    Route::get('/view-performance', [TrafoController::class, 'show'])->middleware(['auth', 'verified'])->name('view-performance');
    Route::get('/trafo-register', [TrafoController::class, 'create'])->name('trafo-register');
    Route::post('/trafo-register', [TrafoController::class, 'store'])->name('trafo.store');

    Route::post('/mark-as-read', [NotificationController::class, 'markAsRead'])->name('markNotification');
    Route::get('/stats', [StatisticController::class, 'index'])->name('statistics.index');
    Route::get('/m', [StatisticController::class, 'maintenance'])->name('statistics.maintanance');
    Route::get('/mp', [StatisticController::class, 'mainpunc'])->name('statistics.mainpunc');

    Route::get('/maintenance',[TrafoController::class, 'maintenance'])->name('maintenance');
    Route::get('/add-maintenance', [TrafoController::class, 'get_maintenance'])->name('maintenance.get');
    Route::post('/add-maintenance', [TrafoController::class, 'update_maintenance'])->name('maintenance.update');

});

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

Route::get('/trafo/edit', [TrafoController::class, 'edit'])->name('trafo.edit');
Route::post('/trafo', [TrafoController::class, 'update'])->name('trafo.update');

Route::resource('trafo', TrafoController::class)->middleware('auth');

Route::get('/view-all', [NotificationController::class, 'index'])->name('notification.view-all');

Route::get('trafo/add-performance/{id}', [TrafoUpdateController::class, 'edit'])->name('add-performance');
Route::post('/trafo-performance/{id}/store', [TrafoUpdateController::class, 'store'])->name('trafo-performance-store');

require __DIR__ . '/auth.php';