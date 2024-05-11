<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return "Everything working fine";
});


// Route::post('laravel-validation', [Api\ValidateController::class, 'laravelValidation']);
// Route::post('validation-rules', [Api\ValidateController::class, 'usingValidationRules']);

// Route::post('custom-validation', [Api\ValidateController::class, 'usingValidationRules']);
// // php artisan make:request CustomValidationRequest
// // Next, Open the generated CustomValidationRequest class located in app/Http/Requests:


// Route::post('register', [Api\AuthController::class, 'register']);
// Route::post('login-agency', [Api\AuthController::class, 'loginAgency']);
// // Route::post('login', [Api\AuthController::class, 'login'])->middleware('throttle:login')->name('login');
// Route::group(['middleware' => ['agentAuth']], function () {
//     Route::post('login', [Api\AuthController::class, 'login'])->name('login');
// });

// All stuf from laravel-app-8
