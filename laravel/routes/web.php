<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[HomeController::class,'home']);
Route::get('/post/{id}',[HomeController::class,'postDetails'])->name('post_details');




Route::get('/admin/login',[AdminController::class,'login']);
Route::post('/admin/login',[AdminController::class,'submitLogin'])->name('admin.login');
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');

//Category
Route::get('/admin/category/{id}/delete',[CategoryController::class,'destroy']);
Route::resource('admin/category', CategoryController::class);
//Post
Route::get('/admin/post/{id}/delete',[PostController::class,'destroy']);
Route::resource('admin/post', PostController::class);
//Setting
Route::get('admin/setting',[SettingController::class,'index'])->name('setting.index');
Route::post('admin/setting',[SettingController::class,'store'])->name('admin.setting');
