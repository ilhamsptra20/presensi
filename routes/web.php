<?php

use App\Http\Controllers\AbsentController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\WriterController;

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


Auth::routes([
    'register'=> false, 
]);

// Admin routes
Route::middleware('auth:admin')->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');    
    Route::resource('rayon', RayonController::class);
    Route::resource('rombel', RombelController::class);
    Route::resource('student', StudentController::class);
    Route::resource('book', BookController::class);
    Route::resource('publisher', PublisherController::class);
    Route::resource('writer', WriterController::class);
});

// Student routes
Route::middleware('auth:student')->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('student');
Route::prefix('')->middleware('auth:student')->group(function () {
    Route::get('absent-today', [AbsentController::class, 'index'])->name('today');
    Route::get('absent-statistik', [AbsentController::class, 'statistik'])->name('statistik');
    Route::get('library', [LibraryController::class, 'index'])->name('library');
    Route::get('book', [LibraryController::class, 'show'])->name('library.book');
    Route::post('borrow', [LibraryController::class, 'borrow'])->name('library.borrow');
    Route::post('arrival', [AbsentController::class, 'arrival']);
    Route::put('go-home/{id}', [AbsentController::class, 'go_home']);
});


