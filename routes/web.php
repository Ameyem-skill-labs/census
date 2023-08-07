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



Route::get('/db-test', function () {
    // return "Database connection successful!";
    try {
        DB::connection()->getPdo();
        return "Database connection successful! hey";
    } catch (\Exception $e) {
        return "Failed to connect to the database. " . $e->getMessage();
    }
    
});



Route::get('/images/{filename}', 'ImageController@showImage2');
Route::get('/images/{field}/{filename}', 'ImageController@showImage');
// Route::get('/images/avatar/{filename}', 'ImageController@showImage');
// Auth::routes();
Route::get('/login-register', ['as'=>'login','uses'=> 'App\Http\Controllers\UserController@loginRegister']);
Route::post('/login', [UserController::class, 'loginRegister']);
// Route::controller(AuthController::class)->group(function () {
//     Route::post('login2', 'login');
// });
Route::post('/register', [UserController::class, 'registerUser']);

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('auth.logout');
// Confirm Account
// Route::get('/confirm/{code}',[AuthController::class, 'confirmAccount']);
Route::get('/confirm/{code}',[UserController::class, 'confirm']);
// Route::post('/confirm/{code}',[AuthController::class, 'confirmAccount']);

// Forgot Password
Route::get('/forgot/password',[UserController::class, 'forgotPassword']);
Route::post('/forgot/password',[UserController::class, 'forgotPassword']);


// Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
// Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');
Route::get('change_password',[App\Http\Controllers\Auth\ChangePasswordController::class, 'showChangePasswordForm'])->name('auth.change_password');
Route::patch('change_password',[App\Http\Controllers\Auth\ChangePasswordController::class, 'changePassword'])->name('auth.change_password_a');


    // Route::get('api/fetch-states', [StateMandalController::class, 'fetchState']);

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    // Route::get('/home', 'HomeController@index');
    Route::get('/home', [HomeController::class, 'index']);
    // Route::resource('posts', PostController::class);
    Route::resource('villages', VillageController::class);
    Route::resource('people', PeopleController::class);
    
    Route::post('api/fetch-states', [StateMandalController::class, 'fetchState']);
    Route::post('api/fetch-districts', [StateMandalController::class, 'fetchDistrict']);
    Route::post('api/fetch-mandals', [StateMandalController::class, 'fetchMandal']);
    Route::post('api/fetch-villages', [StateMandalController::class, 'fetchVillage']);

    // Route::get('/home',function (){return 'Hello';});
    // Route::get('/dashboard',[App\Http\Controllers\Admin\AdminController::class, 'dashboard']);
    // Route::get('/dashboard',function(){return ['something'];});
    // Route::resource('roles', 'Admin\RolesController');
    // Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    // Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    
    // Route::resource('expense_categories', 'Admin\ExpenseCategoriesController');
    // Route::post('expense_categories_mass_destroy', ['uses' => 'Admin\ExpenseCategoriesController@massDestroy', 'as' => 'expense_categories.mass_destroy']);

    
    
    // Route::resource('income_categories', 'Admin\IncomeCategoriesController');
    // Route::post('income_categories_mass_destroy', ['uses' => 'Admin\IncomeCategoriesController@massDestroy', 'as' => 'income_categories.mass_destroy']);
    // Route::resource('incomes', 'Admin\IncomesController');
    // Route::post('incomes_mass_destroy', ['uses' => 'Admin\IncomesController@massDestroy', 'as' => 'incomes.mass_destroy']);
    // Route::resource('expenses', 'Admin\ExpensesController');
    // Route::post('expenses_mass_destroy', ['uses' => 'Admin\ExpensesController@massDestroy', 'as' => 'expenses.mass_destroy']);
    // Route::resource('monthly_reports', 'Admin\MonthlyReportsController');
    // Route::resource('currencies', 'Admin\CurrenciesController');
    // Route::post('currencies_mass_destroy', ['uses' => 'Admin\CurrenciesController@massDestroy', 'as' => 'currencies.mass_destroy']);
    // Route::post('currencies_restore/{id}', ['uses' => 'Admin\CurrenciesController@restore', 'as' => 'currencies.restore']);
    // Route::delete('currencies_perma_del/{id}', ['uses' => 'Admin\CurrenciesController@perma_del', 'as' => 'currencies.perma_del']);
      
});

Route::group(['middleware' => ['auth'],'prefix' => 'admin'], function (){
    // Route::get('attendance/{id}/delete', 'AttendanceController@deleteAttendance')->name('deleteattendance');
    // Route::resource('attendance','AttendanceController');
    // Route::resource('attendance', [App\Http\Controllers\Admin\AttendanceController::class, 'attendance']);
    // Route::get('attendance', [App\Http\Controllers\AttendanceController::class, 'index']);
    // Route::get('attendance','AttendanceController@index')->name('attendance');
    // Route::get('attendance','AttendanceController@index')->name('attendance');

    // Route::get('addAttendance','AttendanceController@addAttendance')->name('addAttendance');

    
    // Route::get('attendances','AttendanceController@all')->name('attendances');

    // Route::get('attendance/details/{id}','AttendanceController@getAttendance');
    // Route::get('atedit/{id}','AttendanceController@editAttendance');
    // Route::get('attendance/delete/{id}','AttendanceController@deleteAttendance');
    

    // Route::get('search','AttendanceController@searchAttendance')->name('search');
    

    // Route::post('trytoaddattendance','AttendanceController@store')->name('trytoaddattendance');
    // Route::post('trytoupdateattendance','AttendanceController@update')->name('trytoupdateattendance');
    // Route::post('trytodeleteattendance','AttendanceController@delete')->name('trytodeleteattendance');
    // Route::post('attendance/byDate','AttendanceController@searchByDate')->name('byDate');
    // Route::post('attendance/byMonth','AttendanceController@searchByMonth');r
    // Route::post('attendance/byYear','AttendanceController@searchByYear');
    // Route::post('attendance/byUsername','AttendanceController@searchByUsername');
// for CENSUS routes
    Route::get('censuses','CensusController@index')->name('census');
    Route::get('addcensus','CensusController@addEmployee')->name('addcensuses');
    
    // Route::resource('villages', 'App\Http\Controllers\Admin\VillageController');
    

    // Route::get('villages', ['as'=>'villages','uses'=> 'App\Http\Controllers\Admin\VillageController@index']);
    Route::post('villages_mass_destroy', ['uses' => 'App\Http\Controllers\Admin\VillageController@massDestroy', 'as' => 'villages.mass_destroy']);
    // Route::post('people_mass_destroy', ['uses' => 'PeopleController@massDestroy', 'as' => 'people.mass_destroy']);
    // Route::get('employees','EmployeesController@index')->name('employee');
    // Route::get('addemployee','EmployeesController@addEmployee')->name('addemployee');
    // Route::get('employee/details/{id}','EmployeesController@getEmployee');
    // Route::get('employee/edit/{id}','EmployeesController@editEmployee');
    // Route::get('employee/delete/{id}','EmployeesController@deleteEmployee');
    // Route::post('trytoaddemployee','EmployeesController@create');
    // Route::post('trytoupdateemployee',array('uses'=>'EmployeesController@update'));
    // Route::post('trytodeleteemployee',array('uses'=>'EmployeesController@delete'));
    // Route::post('trytoaddtask','TasksController@create')->name('trytoaddtask');


//for TASKS routes
    // Route::get('tasks','TasksController@index')->name('task');
    // Route::get('addtask','TasksController@addTask')->name('addtask');
    // Route::get('mytasks','TasksController@adminTasks')->name('mytask');
    
    // Route::get('task/details/{id}','TasksController@getTask');
    // Route::get('task/edit/{id}','TasksController@editTask');
    // Route::get('task/delete/{id}','TasksController@deleteTask');

    // Route::post('trytoaddtask','TasksController@create')->name('trytoaddtask');
    // Route::post('trytoupdatetask',array('uses'=>'TasksController@update'))->name('trytoupdatetask');
    // Route::post('trytoupdatemytask',array('uses'=>'TasksController@update'));
    // Route::post('trytodeletetask',array('uses'=>'TasksController@delete'))->name('trytodeletetask');

});


