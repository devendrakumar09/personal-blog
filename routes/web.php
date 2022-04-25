<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Blog\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ArticalController;
use App\Http\Controllers\Blog\CategoryArticalController;
use App\Http\Controllers\Blog\TagArticalController;

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
Route::get('/',[HomeController::class,'index']);
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/blog/{slug}',[HomeController::class,'blogDetail'])->name('blog-details');
Route::get('category/{slug}',[CategoryArticalController::class,'index'])->name('categories');
Route::get('tag/{slug}',[TagArticalController::class,'index'])->name('tag');
//Admin COntrollers
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'],function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('category',CategoryController::class);
    Route::resource('tag',TagController::class);
    Route::resource('artical',ArticalController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', function() {
    return redirect('login');
});

Route::get('/password/reset',function(){
    return redirect('login');
});