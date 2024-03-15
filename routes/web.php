<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\frontendController;
use App\Http\Controllers\Backend\Category\CategoryController;

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category/create',[CategoryController::class, 'createCategoryForm']);
Route::post('/category/store',[CategoryController::class, 'categoryStore']);
Route::get('/category/manage',[CategoryController::class,'categoryManage']);
Route::get('/category/edit/{id}',[CategoryController::class,'categoryEdit']);
Route::get('/category/delete/{id}',[CategoryController::class,'categoryDelete']);
Route::post('/category/update/{id}',[CategoryController::class,'categoryUpdate']);
