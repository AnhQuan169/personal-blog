<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('login', [LoginController::class, 'index'])->name('login_form');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth.admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    // Route::prefix('category')->name('category.')->group(function () {
        Route::resource('categories', CategoryController::class);
    // });
});
