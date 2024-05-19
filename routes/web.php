<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/login',[AuthController::class,'login'])->name('login');

Route::get('/register',[AuthController::class,'register'])->name('register');

Route::post('/register/process',[AuthController::class,'register_process'])->name('register.process');



Route::prefix('admin')->group(function (){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::post('/send_message',[DashboardController::class,'send'])->name('send.message');
});