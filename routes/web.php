<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\frontendController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Frontend\CartController;

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


Route::get('/',[frontendController::class,'index']);
Route::post('/add/to/cart',[CartController::class,'addToCart']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category/create',[CategoryController::class, 'createCategoryForm']);
Route::post('/category/store',[CategoryController::class, 'categoryStore']);
Route::get('/category/manage',[CategoryController::class,'categoryManage']);
Route::get('/category/edit/{id}',[CategoryController::class,'categoryEdit']);
Route::get('/category/delete/{id}',[CategoryController::class,'categoryDelete']);
Route::post('/category/update/{id}',[CategoryController::class,'categoryUpdate']);
Route::get('/product/add',[ProductController::class,'addProduct']);
Route::get('/product/manage',[ProductController::class,'manageProduct']);
Route::post('/product/store',[ProductController::class,'storeProduct']);
Route::get('/product/delete/{id}',[ProductController::class,'deleteProduct']);
Route::get('/product/edit/{id}',[ProductController::class,'editProduct']);
Route::post('/product/update/{id}',[ProductController::class,'updateProduct']);

