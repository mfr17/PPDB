<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentAddmissionController;
use App\Http\Controllers\TempController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth::routes();

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/daftar', [StudentAddmissionController::class, 'create'])->name('students.create');
Route::get('/{id}/cetak-pdf', [StudentAddmissionController::class, 'cetak'])->name('students.cetak')->middleware('auth');
Route::get('/{id}/download-pdf', [StudentAddmissionController::class, 'download'])->name('siswa.download');

Route::post('/ppdb', [StudentAddmissionController::class, 'store'])->name('students.store');
