<?php

use App\Http\Controllers\StudentAddmissionController;
use App\Http\Controllers\TempController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('test');
// });

Route::get('/create', [TempController::class, 'create'])->name('temp.create');
Route::post('/temp', [TempController::class, 'store'])->name('temp.store');

Route::get('/daftar', [StudentAddmissionController::class, 'create'])->name('students.create');

Route::post('/ppdb', [StudentAddmissionController::class, 'store'])->name('students.store');
