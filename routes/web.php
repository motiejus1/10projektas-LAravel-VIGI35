<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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
    Route::get('/',[UserController::class, 'index'])->name('users.index')->middleware('auth'); //????????????????
    Route::get('/create',[UserController::class, 'create'])->name('users.create')->middleware('auth');
    Route::post('/store',[UserController::class, 'store'])->name('users.store')->middleware('auth');
    Route::get('/edit/{user}',[UserController::class, 'edit'])->name('users.edit')->middleware('auth');
    Route::post('/update/{user}',[UserController::class, 'update'])->name('users.update')->middleware('auth');
    Route::post('/destroy/{user}',[UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
    Route::get('/show/{user}',[UserController::class, 'show'])->name('users.show')->middleware('auth');
});

Route::prefix('roles')->group(function() {
    Route::get('/',[RoleController::class, 'index'])->name('roles.index');
    Route::get('/create',[RoleController::class, 'create'])->name('roles.create');
    Route::post('/store',[RoleController::class, 'store'])->name('roles.store');
    Route::get('/edit/{id}',[RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/update/{id}',[RoleController::class, 'update'])->name('roles.update');
    Route::post('/destroy/{id}',[RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('/show/{id}',[RoleController::class, 'show'])->name('roles.show');
});

Route::prefix('permissions')->group(function() {
    Route::get('/',[PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/create',[PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/store',[PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/edit/{id}',[PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/update/{id}',[PermissionController::class, 'update'])->name('permissions.update');
    Route::post('/destroy/{id}',[PermissionController::class, 'destroy'])->name('permissions.destroy');
    Route::get('/show/{id}',[PermissionController::class, 'show'])->name('permissions.show');
});