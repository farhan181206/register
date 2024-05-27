<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForgotPasswordController;
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

Route::post('/login/process',[AuthController::class,'login_process'])->name('login.process');

Route::get('/register',[AuthController::class,'register'])->name('register');

Route::post('/register/process',[AuthController::class,'register_process'])->name('register.process');

Route::get('/verify/{phone}/{random_url}',[AuthController::class,'verify'])->name('verify');

Route::post('/verify/process',[AuthController::class,'verify_process'])->name('verify.process');

Route::post('/resend/otp',[AuthController::class,'resend'])->name('resend');

Route::get('/forgot-password',[ForgotPasswordController::class,'showForgotPasswordForm'])->name('forgot.password');

Route::post('/forgot-password/process',[ForgotPasswordController::class,'submitForgotPasswordForm'])->name('forgot.password.post');

Route::get('/reset-password/{token}',[ForgotPasswordController::class,'showResetPasswordForm'])->name('reset.password');

Route::post('/reset-password/process',[ForgotPasswordController::class,'submitResetPasswordForm'])->name('reset.password.post');


Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::post('/send_message',[DashboardController::class,'send'])->name('send.message');
    
    Route::get('/category/index',[CategoryController::class,'index'])->name('category.index');

    Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/category/create/process',[CategoryController::class,'store'])->name('category.process');

    Route::get('/category/detail/{id}',[CategoryController::class,'show'])->name('category.show');

    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');

    Route::delete('/category/delete/{id}',[CategoryController::class,'destroy'])->name('category.destroy');


    //article
    Route::get('/article',[ArticleController::class,'index'])->name('article.index');

    Route::get('/article/create',[ArticleController::class,'create'])->name('article.create');

    Route::post('/article/create/process',[ArticleController::class,'store'])->name('article.store');

    Route::get('/article/edit/{id}',[ArticleController::class,'edit'])->name('article.edit');

    Route::put('/article/edit/process/{id}',[ArticleController::class,'update'])->name('article.update');

});