<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdvertisingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\HomeController;

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

//admin
Route::get('/backend/admin',[AdminController::class, 'index']);
Route::get('/auth/register',[AdminController::class, 'adduser']);
Route::get('/auth/logout',[AdminController::class, 'logout']);

// Frontend
Route::get('/frontend/index',[FrontEndController::class, 'index']);
Route::get('category/{slug}',[FrontEndController::class, 'category']);
Route::get('article/{slug}', [FrontEndController::class, 'article']);
Route::get('page/{slug}', [FrontEndController::class, 'page']);

//setting
Route::get('/admin/setting/index', [SettingController::class, 'index']);
Route::get('/admin/setting/create',[SettingController::class, 'create']);
Route::post('/admin/setting/store',[SettingController::class, 'store']);
Route::post('/admin/setting/destroy/{id}',[SettingController::class, 'destroy']);
Route::get('/admin/setting/edit/{id}',[SettingController::class, 'edit']);
Route::post('/admin/setting/update/{id}',[SettingController::class, 'update']);

//Category
Route::get('/admin/category/index', [CategoryController::class, 'index']);
Route::get('/admin/category/create',[CategoryController::class, 'create']);
Route::post('/admin/category/store',[CategoryController::class, 'store']);
Route::post('/admin/category/destroy/{id}',[CategoryController::class, 'destroy']);
Route::get('/admin/category/edit/{id}',[CategoryController::class, 'edit']);
Route::post('/admin/category/update/{id}',[CategoryController::class, 'update']);

//posts
Route::get('/admin/posts/index', [PostController::class, 'index']);
Route::get('/admin/posts/create',[PostController::class, 'create']);
Route::post('/admin/posts/store',[PostController::class, 'store']);
Route::post('/admin/posts/destroy/{id}',[PostController::class, 'destroy']);
Route::get('/admin/posts/edit/{id}',[PostController::class, 'edit']);
Route::post('/admin/posts/update/{id}',[PostController::class, 'update']);

//pages
Route::get('/admin/pages/index', [PageController::class, 'index']);
Route::get('/admin/pages/create',[PageController::class, 'create']);
Route::post('/admin/pages/store',[PageController::class, 'store']);
Route::post('/admin/pages/destroy/{id}',[PageController::class, 'destroy']);
Route::get('/admin/pages/edit/{id}',[PageController::class, 'edit']);
Route::post('/admin/pages/update/{id}',[PageController::class, 'update']);

//Message
Route::get('/admin/message/index', [MessageController::class, 'index']);
Route::get('/admin/message/create',[MessageController::class, 'create']);
Route::post('/admin/message/store',[MessageController::class, 'store']);
Route::post('/admin/message/destroy/{id}',[MessageController::class, 'destroy']);
Route::get('/admin/message/edit/{id}',[MessageController::class, 'edit']);
Route::post('/admin/message/update/{id}',[MessageController::class, 'update']);

//Advertising
Route::get('/admin/advertising/index', [AdvertisingController::class, 'index']);
Route::get('/admin/advertising/create',[AdvertisingController::class, 'create']);
Route::post('/admin/advertising/store',[AdvertisingController::class, 'store']);
Route::post('/admin/advertising/destroy/{id}',[AdvertisingController::class, 'destroy']);
Route::get('/admin/advertising/edit/{id}',[AdvertisingController::class, 'edit']);
Route::post('/admin/advertising/update/{id}',[AdvertisingController::class, 'update']);

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', function (){
    return view('/auth/login');
});

