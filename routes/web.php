<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VillageController;
// use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\StateMandalController;
use App\Http\Controllers\Admin\PeopleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
Route::get('/', function () {
    return view('home.index');
});
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

// Route::get('/db-test', function () {
//     // return "Database connection successful!";
//     try {
//         DB::connection()->getPdo();
//         return "Database connection successful! hey";
//     } catch (\Exception $e) {
//         return "Failed to connect to the database. " . $e->getMessage();
//     }
    
// });



// Route::get('/images/{filename}', 'ImageController@showImage2');
// Route::get('/images/{field}/{filename}', 'ImageController@showImage');
// // Route::get('/images/avatar/{filename}', 'ImageController@showImage');
// // Auth::routes();
// // Route::get('/login-register', ['as'=>'login','uses'=> 'App\Http\Controllers\UserController@loginRegister']);
// Route::post('/login', [UserController::class, 'loginRegister']);
// // Route::controller(AuthController::class)->group(function () {
// //     Route::post('login2', 'login');
// // });
// Route::post('/register', [UserController::class, 'registerUser']);

// Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('auth.logout');
// // Confirm Account
// // Route::get('/confirm/{code}',[AuthController::class, 'confirmAccount']);
// Route::get('/confirm/{code}',[UserController::class, 'confirm']);
// // Route::post('/confirm/{code}',[AuthController::class, 'confirmAccount']);

// // Forgot Password
// Route::get('/forgot/password',[UserController::class, 'forgotPassword']);
// Route::post('/forgot/password',[UserController::class, 'forgotPassword']);
// Route::get('change_password',[App\Http\Controllers\Auth\ChangePasswordController::class, 'showChangePasswordForm'])->name('auth.change_password');
// Route::patch('change_password',[App\Http\Controllers\Auth\ChangePasswordController::class, 'changePassword'])->name('auth.change_password_a');


//     // Route::get('api/fetch-states', [StateMandalController::class, 'fetchState']);

// Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
//     // Route::get('/home', 'HomeController@index');
//     Route::get('/home', [HomeController::class, 'index']);
//     // Route::resource('posts', PostController::class);
//     Route::resource('villages', VillageController::class);
//     Route::resource('people', PeopleController::class);
    
//     Route::post('api/fetch-states', [StateMandalController::class, 'fetchState']);
//     Route::post('api/fetch-districts', [StateMandalController::class, 'fetchDistrict']);
//     Route::post('api/fetch-mandals', [StateMandalController::class, 'fetchMandal']);
//     Route::post('api/fetch-villages', [StateMandalController::class, 'fetchVillage']);
//     Route::resource('users', UserController::class);

      
// });

// Route::group(['middleware' => ['auth'],'prefix' => 'admin'], function (){
//     Route::get('censuses','CensusController@index')->name('census');
//     Route::get('addcensus','CensusController@addEmployee')->name('addcensuses');
//     Route::post('villages_mass_destroy', ['uses' => 'App\Http\Controllers\Admin\VillageController@massDestroy', 'as' => 'villages.mass_destroy']);
    
// });


