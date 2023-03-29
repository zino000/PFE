<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\CertificatMedicalController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [LoginController::class, 'login']);
Route::delete('logout' , [loginController::class , 'logout']);

Route::resource('patient', PatientController::class);
Route::resource('consultation', ConsultationController::class);
Route::resource('ordonnance', OrdonnanceController::class);
Route::resource('medicament', MedicamentController::class);
Route::resource('certificat_medical', CertificatMedicalController::class);
Route::resource('facture', FactureController::class);
Route::resource('admin', AdminController::class);

Route::resource('rendez_vous', RendezVousController::class);
Route::resource('service', ServiceController::class);








