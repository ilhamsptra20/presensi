<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('home', )
Auth::routes();

// Admin routes
Route::middleware('auth:admin')->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');    
    Route::resource('rayon', RayonController::class);
    Route::resource('rombel', RombelController::class);
    Route::resource('student', StudentController::class);
});

// Student routes
Route::prefix('student')->middleware('auth:student')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('student');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
