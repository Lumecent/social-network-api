<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\User\ProfileController;
use App\Http\Controllers\API\V1\User\SocialController;
use App\Http\Controllers\API\V1\User\SecurityController;

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

Route::group(['prefix' => '/v1'], function (){
    Route::group(['prefix' => '/auth'], function (){
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
    });

    Route::group(['middleware' => ['auth:sanctum']], function (){
        Route::group(['prefix' => '/user'], function (){
            Route::get('/{alias}/settings/profile', [ProfileController::class, 'index']);
            Route::put('/{alias}/settings/profile', [ProfileController::class, 'updateProfile']);
            Route::put('/{alias}/settings/avatar', [ProfileController::class, 'updateAvatar']);
            Route::delete('/{alias}/settings/avatar', [ProfileController::class, 'deleteAvatar']);
            Route::put('/{alias}/settings/cover', [ProfileController::class, 'updateCover']);
            Route::delete('/{alias}/settings/cover', [ProfileController::class, 'deleteCover']);

            Route::get('/{alias}/settings/social', [SocialController::class, 'index']);
            Route::post('/{alias}/settings/social', [SocialController::class, 'store']);
            Route::put('/{alias}/settings/social/{social_id}', [SocialController::class, 'update']);
            Route::delete('/{alias}/settings/social/{social_id}', [SocialController::class, 'destroy']);

            Route::put('/{alias}/settings/password', [SecurityController::class, 'updatePassword']);
        });

        Route::post('/auth/logout', [AuthController::class, 'logout']);
    });
});
