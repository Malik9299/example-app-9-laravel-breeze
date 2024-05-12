<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
use App\Http\Controllers\CategoryController;

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

Route::group(['middleware' => ['userAuth']], function () {
    Route::post('login', [Api\AuthController::class, 'login'])->name('login');
});

Route::middleware('auth:sanctum')->get('/categories', [CategoryController::class, 'index']);


// Route::middleware('auth:sanctum')->group(function () {
//     // API Resource routes for categories
//     Route::apiResource('categories', CategoryController::class);

//     // Custom route for creating a new category (POST request)
//     // Route::post('categories', [CategoryController::class, 'store']);
// });

// Route::resource('/categories', CategoryController::class);



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
