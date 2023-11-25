<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VillageController;
// use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\StateMandalController;
use App\Http\Controllers\Admin\PeopleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\UserFollowController;
use App\Http\Controllers\Profile\ProfileController;

Route::prefix('')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    // Route::post('login', [AuthController::class, 'login']);
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user', [AuthController::class, 'loadUser']); 
    Route::get('users', [UserController::class, 'getUsers']); 
    Route::post('username', [UserController::class, 'checkUser']); 
    Route::get('/confirm/{code}',[UserController::class, 'confirm']);
});
Route::get('/test', function () {
    return response()->json(['message' => 'API Test Successful!'], 200);
});
Route::get('/images/{filename}', 'ImageController@showImage');

Route::get('/{action}/soptions', [SanghamController::class, 'handleAction']);
// Route::post('/sangham/new', [SanghamController::class, 'storeNewsangham']);
// Route::get('/sanghams', [SanghamController::class, 'getSanghams']);

Route::post('/member/new', [SanghamController::class, 'storeNewmember']);
Route::get('/members/{sangh_id}', [SanghamController::class, 'getMembers']);



Route::apiResource('profile', 'App\Http\Controllers\Profile\ProfileController');
Route::get('/profession/options', [ProfileController::class, 'getProfession']);


Route::get('/{action}/options', [ProfileController::class, 'handleAction']);
Route::post('/profile/{field}/upload', [ProfileController::class, 'upload']);
Route::post('/profile/{field}', [ProfileController::class, 'updateField']);
Route::post('/profession', [ProfileController::class, 'storeNewprofession']);

// Route::apiResource('matrimony', 'App\Http\Controllers\MatrimonyProfileController');
// Route::post('/matrimony/{field}/matrimonyupload', [MatrimonyProfileController::class, 'matrimonyupload']);

Route::get('/descriptions', [DescriptionController::class, 'index']);
Route::post('/descriptions', [DescriptionController::class, 'store']);
