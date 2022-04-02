<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\AppointmentsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AppointmentsController::class,'listAppointment'])->name('appointments.list');


//  ?   Doctor
Route::resource('doctors', DoctorsController::class);


//  ?   Appointment
Route::get('appointments', [AppointmentsController::class,'index'])->name('appointments.index');
Route::post('/getDoctor', [AppointmentsController::class,'getDoctor'])->name('appointments.getDoctor');
Route::post('/getFee', [AppointmentsController::class,'getFee'])->name('appointments.getFee');
Route::post('/getAppointmet', [AppointmentsController::class,'getAppointmet']);
Route::get('/remove/{id}', [AppointmentsController::class,'remove'])->name('appointments.remove');
Route::post('/addAppointment', [AppointmentsController::class,'addAppointment']);
Route::get('appointments/list', [AppointmentsController::class,'listAppointment'])->name('appointments.list');
