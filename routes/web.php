<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\CreateProblem;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\StandingsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function (){
    Route::get('/login-register', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('_login');
    Route::post('/register', [AuthController::class, 'register'])->name('_register');
    Route::prefix('admin')->group(function (){
        Route::get('/login', [AdminController::class, 'index'])->name('admin.login');
        Route::post('/signing', [AdminController::class, 'login'])->name('admin.login.new');
    });
});

Route::prefix('admin')->group(function (){
   Route::group(['middleware' => ['auth', 'redirectIfUser']], function (){
       Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
       Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
       Route::resource('dashboard', DashboardController::class, [
           "as" => "super-admin"
       ]);
       Route::resource('question', CreateProblem::class, [
           "as" => "super-admin"
       ]);
   });
});

Route::group(['middleware' => ['auth', 'redirectIfAdmin']], function (){
    Route::get("/", [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get("/contest", [ContestController::class, 'index'])->name('contest');
    Route::get("/contest", [ContestController::class, 'index'])->name('contest');
    Route::get("/problem", [ProblemController::class, 'index'])->name('problem');
    Route::get("/standings", [StandingsController::class, 'index'])->name('standings');
});
