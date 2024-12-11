<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;

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
    return view('users.index');
});



Route::get('/dashboard', [AdminController::class, 'index']);

Route::get('/upload', [AdminController::class, 'upload']);
Route::post('/upload',[AdminController::class, 'store'])->name('project.store');
Route::get('/upload/list',[AdminController::class, 'UploadList'])->name('upload.list');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

Route::get('/login', [AuthController::class, 'ShowLogin']);
Route::post('/login', [AuthController::class, 'Login'])->name('auth.login');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');