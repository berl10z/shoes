<?php

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


Route::get('/register',[AuthController::class,'registerShow'])->name('registerShow');
Route::post('/register_process',[AuthController::class,'register'])->name('register_process');

Route::get('/login',[AuthController::class,'loginShow'])->name('loginShow');
Route::post('/login_process',[AuthController::class,'login'])->name('login_process');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/catalog', [ProductController::class,'showCatalog'])->name('catalog');
Route::get('/catalog/{id}', [ProductController::class,'show'])->name('detail');
