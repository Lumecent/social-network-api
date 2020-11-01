<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\User\UserProfileController;
use App\Http\Controllers\API\V1\User\UserSocialController;
use App\Http\Controllers\API\V1\User\UserSecurityController;

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
            Route::get('/{alias}/settings/profile', [UserProfileController::class, 'index']);
            Route::put('/{alias}/settings/profile', [UserProfileController::class, 'updateProfile']);
            Route::put('/{alias}/settings/avatar', [UserProfileController::class, 'updateAvatar']);
            Route::delete('/{alias}/settings/avatar', [UserProfileController::class, 'deleteAvatar']);
            Route::put('/{alias}/settings/cover', [UserProfileController::class, 'updateCover']);
            Route::delete('/{alias}/settings/cover', [UserProfileController::class, 'deleteCover']);

            Route::post('/{alias}/settings/social', [UserSocialController::class, 'store']);
            Route::put('/{alias}/settings/social/{social_id}', [UserSocialController::class, 'update']);
            Route::delete('/{alias}/settings/social/{social_id}', [UserSocialController::class, 'destroy']);

            Route::put('/{alias}/settings/password', [UserSecurityController::class, 'updatePassword']);
        });

        Route::post('/auth/logout', [AuthController::class, 'logout']);
    });
});
