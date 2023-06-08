<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\UserController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('guest')->group(function () {
    Route::prefix('user')->group(function() {
        Route::post('register', [UserController::class, 'register']);
        Route::post('login', [UserController::class, 'login']);
        // Route::post('update', [UserController::class, 'update']);
    });
    Route::prefix('admin')->group(function() {
        Route::post('register', [AdminController::class, 'register']);
        Route::post('login', [AdminController::class, 'login']);
    });

});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::post('update', [AdminController::class, 'update']);
    });
});

Route::middleware('auth:user')->group(function () {
    Route::prefix('user')->group(function() {
        Route::post('update', [UserController::class, 'update']);
    });

    Route::prefix('blog')->group(function() {
        Route::get('/', [BlogController::class, 'showAll']);
        Route::get('/{blog}', [BlogController::class, 'show']);
        Route::post('/', [BlogController::class, 'store']);
        Route::post('/{blog}', [BlogController::class, 'update']);
        Route::delete('/', [BlogController::class, 'deleteAll']);
        Route::delete('/{blog}', [BlogController::class, 'delete']);
    });
});
