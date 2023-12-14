<?php

use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\CreateProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/register', [ApiAuthController::class, 'register']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('/logout', [ApiAuthController::class, 'logout']);

    Route::post('/create', [CreateProductController::class, 'create']);
    Route::get('/index', [CreateProductController::class, 'index']);
    Route::get('/products/{user_id}', [CreateProductController::class, 'show']);

    Route::put('enable', [ApiAuthController::class, 'enable']);
});




