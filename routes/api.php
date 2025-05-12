<?php
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

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return [
        'message' => 'Welcome to Patients Service API'
    ];
});

Route::get('/patient', [PatientController::class, 'index']);
Route::post('/patient', [PatientController::class, 'store']);
Route::put('/patient/{patientId}', [PatientController::class, 'update']);
Route::delete('/patient/{patientId}', [PatientController::class, 'delete']);


