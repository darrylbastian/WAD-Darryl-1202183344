<?php

use App\Http\Controllers\pattientController;
use App\Http\Controllers\vaccineController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

// route untuk patient
Route::get('/patient', [pattientController::class, 'showData'])->name('patient');
// create patient
Route::get('/choose-vaccine', [pattientController::class, 'showVaccine'])->name('choose');
Route::get('/create-patient/{id}', [pattientController::class, 'create'])->name('createpatient');
Route::post('/create-patient/{id}', [pattientController::class, 'store'])->name('createdata');
// update patient
Route::get('/update-patient/{id}', [pattientController::class, 'update'])->name('updatepatient');
Route::post('/update-patient/{id}', [pattientController::class, 'updateprocess'])->name('updateaction');
// delete patient
Route::delete('/delete-patient/{id}', [pattientController::class, 'delete'])->name('deletepatient');

// route untuk vaccine
Route::get('/vaccine', [vaccineController::class, 'showData'])->name('vaccine');
// create
Route::get('/create-vaccine', [vaccineController::class, 'index'])->name('create');
Route::post('/create-vaccine', [vaccineController::class, 'store'])->name('createvaccine');
// update
Route::get('/update-vaccine/{id}', [vaccineController::class, 'update'])->name('updatevaccine');
Route::post('/update-vaccine/{id}', [vaccineController::class, 'updateProcess'])->name('update');
// delete
Route::delete('/delete-vaccine/{id}', [vaccineController::class, 'delete'])->name('deletevaccine');
