<?php

use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('users')->group(function() {
    //middleware - tarpininkas
    //auth - tik prisijungęs vartotojas gali pasiekti šias routes
    Route::get('/',[UserController::class, 'index'])->name('users.index')->middleware('auth');
    Route::get('/create',[UserController::class, 'create'])->name('users.create')->middleware('auth');
    Route::post('/store',[UserController::class, 'store'])->name('users.store')->middleware('auth');
    Route::get('/edit/{user}',[UserController::class, 'edit'])->name('users.edit')->middleware('auth');
    Route::post('/update/{user}',[UserController::class, 'update'])->name('users.update')->middleware('auth');
    Route::post('/destroy/{user}',[UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
    Route::get('/show/{user}',[UserController::class, 'show'])->name('users.show')->middleware('auth');
});

// Route::prefix('roles')->group(function() {
//     Route::get('/',[UserController::class, 'index'])->name('users.index');
//     Route::get('/create',[UserController::class, 'create'])->name('users.create');
//     Route::post('/store',[UserController::class, 'store'])->name('users.store');
//     Route::get('/edit/{user}',[UserController::class, 'edit'])->name('users.edit');
//     Route::post('/update/{user}',[UserController::class, 'update'])->name('users.update');
//     Route::post('/destroy/{user}',[UserController::class, 'destroy'])->name('users.destroy');
//     Route::get('/show/{user}',[UserController::class, 'show'])->name('users.show');
// });

// Route::prefix('permissions')->group(function() {
//     Route::get('/',[UserController::class, 'index'])->name('users.index');
//     Route::get('/create',[UserController::class, 'create'])->name('users.create');
//     Route::post('/store',[UserController::class, 'store'])->name('users.store');
//     Route::get('/edit/{user}',[UserController::class, 'edit'])->name('users.edit');
//     Route::post('/update/{user}',[UserController::class, 'update'])->name('users.update');
//     Route::post('/destroy/{user}',[UserController::class, 'destroy'])->name('users.destroy');
//     Route::get('/show/{user}',[UserController::class, 'show'])->name('users.show');
// });