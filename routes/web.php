<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\home;
use App\Models\registerModel;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\dashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('welcome', welcomeController::class);
Route::resource('register_login', registerController::class);
Route::resource('login', loginController::class);
Route::get('dashboard', [dashboardController::class, 'index'])->name('dashboard');
Route::get('add', [dashboardController::class, 'add_view'])->name('add_view');
Route::post('debt', [dashboardController::class, 'debtInsert'])->name('debt');
Route::get('logout', [dashboardController::class, 'logout'])->name('logout');
Route::post('authenticate', [loginController::class, 'authenticate'])->name('auth');


Route::resource('admin', adminController::class);
Route::get('destroy/{id}', [adminController::class, 'destroy'])->name('delete');
Route::post('update/{id}', [adminController::class, 'update'])->name('update');
Route::post('search', [adminController::class, 'search'])->name('search');