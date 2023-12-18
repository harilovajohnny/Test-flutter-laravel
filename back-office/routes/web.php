<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('/login',[\App\Http\Controllers\LoginController::class,'login'])->name('auth.login');
Route::delete('/logout',[\App\Http\Controllers\LoginController::class,'logout'])->name('auth.logout');
Route::post('/login',[\App\Http\Controllers\LoginController::class,'authentification']);

Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard.index')->middleware('auth');


Route::prefix('/user')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('user.index')->middleware('auth');
    Route::get('/new', 'create')->name('user.create')->middleware('auth');
    Route::post('/new', 'store')->middleware('auth');
    Route::get('/{user}/edit', 'edit')->name('user.edit')->middleware('auth');
    Route::post('/{user}/edit', 'update')->middleware('auth');
    Route::get('/{user}/delete', 'destroy')->name('user.delete')->middleware('auth');
});
