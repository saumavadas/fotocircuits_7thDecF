<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;

use App\Http\Controllers\API\FrontendUserController;
use App\Http\Controllers\API\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/users', [UserController::class, 'index']);


Route::prefix('frontend-users')->group(function () 
{
    Route::post('/register', [FrontendUserController::class, 'register']);
    Route::post('/verify-otp', [FrontendUserController::class, 'verifyOtp']);
    Route::post('/login', [FrontendUserController::class, 'login']);

    Route::put('/update-profile/{id}', [FrontendUserController::class, 'updateProfile']);
});

Route::get('/categories', [CategoryController::class, 'getAllCategories']);

// Route::middleware('auth:sanctum')->prefix('admin/frontend-users')->group(function () 
// {
//     Route::get('/', [FrontendUserController::class, 'index']);
//     Route::get('/{id}', [FrontendUserController::class, 'show']);
//     Route::delete('/{id}', [FrontendUserController::class, 'destroy']);
// });