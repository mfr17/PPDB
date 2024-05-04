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

Route::get('/', function () {
    return view('surat.kop');
});


Route::get('/create', [TempController::class, 'create'])->name('temp.create');

Route::get('/pdf', [StudentAddmissionController::class, 'pdf'])->name('students.pdf');
Route::get('/daftar', [StudentAddmissionController::class, 'create'])->name('students.create');

Route::post('/ppdb', [StudentAddmissionController::class, 'store'])->name('students.store');
