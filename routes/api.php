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

Route::prefix('patient')->middleware('auth.access_key')->group(function () {
    Route::post('/', [PatientController::class, 'store']);
    Route::put('/{patientId}', [PatientController::class, 'update']);
    Route::delete('/{patientId}', [PatientController::class, 'delete']);
    Route::get('/', [PatientController::class, 'index']);
    Route::get('/{patientId}', [PatientController::class, 'detail']);
});
