<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\BlogController;
use App\Models\Blog;
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

Route::get('/', function () {
    $data['blogs'] = Blog::all();
  
    return view('index',$data);;
});
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('register_process',[UserController::class,'register_process'])->name('register_process');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('login_process',[UserController::class,'login_process'])->name('login_process');


Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('dashboard')->middleware('auth');
Route::get('admin/blogs',[BlogController::class,'index'])->name('blogs')->middleware('auth');
Route::get('admin/blogs/create',[BlogController::class,'create'])->name('blogs.create')->middleware('auth');
Route::post('admin/blogs/store',[BlogController::class,'store'])->name('blogs.store')->middleware('auth');
Route::get('admin/blogs/edit/{id}',[BlogController::class,'edit'])->name('blogs.edit')->middleware('auth');
Route::post('admin/blogs/update/{id}',[BlogController::class,'update'])->name('blogs.update')->middleware('auth');
Route::get('admin/blogs/view/{id}',[BlogController::class,'show'])->name('blogs.view')->middleware('auth');
Route::get('admin/blogs/delete/{id}',[BlogController::class,'destroy'])->name('blogs.delete')->middleware('auth');
Route::get('logout',[AdminController::class,'logout'])->name('logout')->middleware('auth');

