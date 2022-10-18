<?php

use App\Http\Controllers\Admin\AbsentController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('todoLogin', [LoginController::class, 'todoLogin'])->name('todoLogin');

Route::get('logout', [LoginController::class, 'Logout'])->name('logout');

//Route Group
Route::group(['middleware' => ['auth']], function() {
    //Route Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //Route Users
    Route::resource('Users', UsersController::class);
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('staff', StaffController::class);
    Route::put('updateIsActive/{id}', [StaffController::class, 'updateIsActive'])->name('update.isactive');
    Route::resource('absent', AbsentController::class);
});
