<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
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
Route::get('/about',[MainController::class,'about'])->name('about');
Route::get('/contacts',[MainController::class,'contacts'])->name('contacts');
Route::get('/standarts',[MainController::class,'standarts'])->name('standarts');

Route::middleware('guest')->group(function(){
    Route::get('/register',[AuthController::class,'registerShow'])->name('registerShow');
    Route::post('/register_process',[AuthController::class,'register'])->name('register_process');
    Route::get('/login',[AuthController::class,'loginShow'])->name('loginShow');
    Route::post('/login_process',[AuthController::class,'login'])->name('login_process');
});


Route::get('/cart/{id}',[CartController::class,'addToCart'])->name('addToCart');
Route::get('/cart',[CartController::class,'index'])->name('cartPage');
Route::get('/cart/{id}/delete',[CartController::class,'deleteFromCart'])->name('deleteFromCart');

Route::get('/catalog', [CategoryController::class,'index'])->name('catalog');
Route::get('{category_slug}/products/', [ProductController::class,'index'])->name('products');
Route::get('/catalog/{id}', [ProductController::class,'show'])->name('detail');

Route::middleware('admin')->prefix('admin/')->group(function(){
    Route::get('/', [AdminController::class,'index'])->name('admin');
    Route::get('/product/{product}/edit', [AdminController::class,'edit'])->name('edit');
    Route::put('/product/{product}', [AdminController::class,'update'])->name('update');
    Route::get('/product/create', [AdminController::class,'create'])->name('create');
    Route::post('/product/store',  [AdminController::class,'store'])->name('store');
    Route::get('/product/{id}/delete',  [AdminController::class,'destroy'])->name('destroy');
});

Route::get('/search',[MainController::class,'search'])->name('search');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');


