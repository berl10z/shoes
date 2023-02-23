<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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
Route::get('/',[MainController::class,'index'])->name('home');
// Route::get('/', [MainController::class,'showLatestProducts'])->name('home');
Route::middleware('guest')->group(function(){
    Route::get('/register',[AuthController::class,'registerShow'])->name('registerShow');
    Route::post('/register_process',[AuthController::class,'register'])->name('register_process');
    Route::get('/login',[AuthController::class,'loginShow'])->name('loginShow');
    Route::post('/login_process',[AuthController::class,'login'])->name('login_process');
});

Route::get('/catalog', [ProductController::class,'index'])->name('catalog');

Route::get('/catalog/{id}', [ProductController::class,'show'])->name('detail');

Route::middleware('admin')->group(function(){
    Route::get('/admin', [AdminController::class,'index'])->name('admin');
    Route::get('/catalog/{product}/edit', [AdminController::class,'edit'])->name('edit');
    Route::put('/catalog/{product}', [AdminController::class,'update'])->name('update');
    Route::get('/create', [AdminController::class,'create'])->name('create');
    Route::post('/catalog/store',  [AdminController::class,'store'])->name('store');
    Route::get('/catalog/{id}/delete',  [AdminController::class,'destroy'])->name('destroy');
});


Route::get('/search',[MainController::class,'search'])->name('search');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');


