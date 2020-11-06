<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\User\ProfileController;
use App\Http\Controllers\API\V1\User\SocialController;
use App\Http\Controllers\API\V1\User\SecurityController;
use App\Http\Controllers\API\V1\Admin\AdminSocialController;
use App\Http\Controllers\API\V1\Admin\AdminBlogCategoryController;
use App\Http\Controllers\API\V1\Admin\AdminAccessController;

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

        Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
            Route::get('/social', [AdminSocialController::class, 'index']);
            Route::post('/social', [AdminSocialController::class, 'store']);
            Route::put('/social/{social_id}', [AdminSocialController::class, 'update']);
            Route::delete('/social/{social_id}', [AdminSocialController::class, 'destroy']);

            Route::get('/blog-category', [AdminBlogCategoryController::class, 'index']);
            Route::post('/blog-category', [AdminBlogCategoryController::class, 'store']);
            Route::put('/blog-category/{category_id}', [AdminBlogCategoryController::class, 'update']);
            Route::delete('/blog-category/{category_id}', [AdminBlogCategoryController::class, 'destroy']);

            Route::get('/access', [AdminAccessController::class, 'index']);
            Route::post('/access', [AdminAccessController::class, 'store']);
            Route::put('/access/{access_id}', [AdminAccessController::class, 'update']);
            Route::delete('/access/{access_id}', [AdminAccessController::class, 'destroy']);
        });

        Route::post('/auth/logout', [AuthController::class, 'logout']);
    });
});
