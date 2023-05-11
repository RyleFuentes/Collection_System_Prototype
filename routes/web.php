<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\home;
use App\Models\registerModel;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ProfileController;

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
Route::resource('login', loginController::class);

Route::get('dashboard', [dashboardController::class, 'index'])->name('dashboard');
Route::get('add', [dashboardController::class, 'add_view'])->name('add_view');
Route::post('debt', [dashboardController::class, 'debtInsert'])->name('debt');
Route::get('logout', [dashboardController::class, 'logout'])->name('logout');
Route::post('authenticate', [loginController::class, 'authenticate'])->name('auth');


Route::resource('admin', adminController::class);
Route::get('edit/{id}', [adminController::class, 'edit'])->name('edit');
Route::post('admin', [adminController::class, 'store'])->name('add_user');
Route::get('destroy/{id}', [adminController::class, 'destroy'])->name('delete');
Route::post('search', [adminController::class, 'search'])->name('search');
Route::put('update_user_role/{id}', [adminController::class, 'update'])->name('update_user_role');



Route::resource('profile', ProfileController::class);
Route::post('check', [ProfileController::class, 'check'])->name('check_pass');


Route::resource('editor', EditController::class);

Route::get('Update_Balance/{id}', [EditController::class, 'update_balance'])->name('update_bal');
Route::put('update/{id}', [EditController::class, 'update'])->name('update');