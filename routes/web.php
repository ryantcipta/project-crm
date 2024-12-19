<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Models\Departments;

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



Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:MD']], function () {
        Route::get('/dashboard', [AdminController::class, 'index']);
        Route::get('/upload', [AdminController::class, 'upload']);
        Route::post('/upload',[AdminController::class, 'store'])->name('project.store');
        Route::get('/upload/list',[AdminController::class, 'UploadList'])->name('upload.list');
        Route::put('/project/{id}', [AdminController::class, 'update'])->name('project.update');
        Route::get('/project/{id}/edit',[AdminController::class, 'ShowEdit'])->name('project.edit');
        Route::get('/users/list',[AdminController::class, 'LastSeen'])->name('users.list');
        Route::get('/departments', [DepartmentsController::class, 'index'])->name('departments');
        Route::get('/departments/create', [DepartmentsController::class, 'create'])->name('create.departments');
        Route::post('/departments/create',[DepartmentsController::class, 'store'])->name('store.departments');
        Route::get('/departments/{id}/edit',[DepartmentsController::class, 'edit'])->name('edit.departments');
        Route::put('/departments/{id}',[DepartmentsController::class, 'update'])->name('update.departments');
        Route::delete('departments/{id}', [DepartmentsController::class, 'destroy'])->name('delete.departments');
        
        
    });
    Route::group(['middleware' => ['cek_login:D']], function () {
        Route::get('/' , [UserController::class, 'index']);
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/users/home', [UserController::class, 'home'])->name('users.home');
        Route::get('/users/all-list', [UserController::class, 'allList'])->name('users.all-list');
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/projects/{id}/edit',[ProjectController::class, 'ShowEdit'])->name('projects.edit');
        Route::put('/projects/{id}',[ProjectController::class, 'update'])->name('projects.update');
        // web.php
Route::post('/project/{id}/toggle-status', [ProjectController::class, 'toggleStatus'])->name('project.toggleStatus');

    });
});



Route::get('/login', [AuthController::class, 'ShowLogin']);
Route::post('/login', [AuthController::class, 'Login'])->name('login');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('auth.forgot-password.send');

Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register-page');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('auth.reset-password');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');


