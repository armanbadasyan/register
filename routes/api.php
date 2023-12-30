<?php

use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\Auth\CountUserController;
use App\Http\Controllers\Auth\EnableController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KinoController;
use App\Http\Controllers\ProductController\AllProductController;
use App\Http\Controllers\ProductController\ProductByUser_idController;
use App\Http\Controllers\ProductController\ProductCreateController;
use App\Http\Controllers\SortController;
use App\Http\Controllers\WeatherController;
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

Route::post('/login',LoginController::class);
Route::post('/register',[RegisterController::class,'register']);
Route::group(['middleware' => ['auth:api']], function () {
    Route::post('/logout', LogoutController::class);
});
Route::get('/all users count', [CountUserController::class, 'count']);

Route::put('enable', [EnableController::class,'enable']);
Route::get('/city', [WeatherController::class, 'weather']);
Route::get('/film', [KinoController::class, 'kino']);
Route::get('/sort', [SortController::class, 'index'])->middleware(['auth:api']);;




    Route::post('/create', [ProductCreateController::class, 'create']);
    Route::get('/index', [AllProductController::class, 'index'])->middleware(['auth:api']);
    Route::get('/products/{user_id}', [ProductByUser_idController::class, 'show']);









