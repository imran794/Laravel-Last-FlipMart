<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
Use App\Http\Controllers\Admin\AdminController;
Use App\Http\Controllers\Admin\RoleController;
Use App\Http\Controllers\Frontend\IndexController;
Use App\Http\Controllers\Frontend\ProfileController;

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



Route::get('/', [IndexController::class, 'Index']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware' =>['admin','auth'],'namespace'=>'admin'], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('role/index',[RoleController::class,'RoleIndex'])->name('role.index');
    Route::post('role/store',[RoleController::class,'RoleStore'])->name('role.store');
    Route::post('role/assign',[RoleController::class,'RoleAssign'])->name('role.assign');
    Route::get('permission/edit/{id}',[RoleController::class,'PermissionEdit'])->name('permission.edit');
    Route::post('permission/update',[RoleController::class,'PermissionUpdate'])->name('permission.update');
    Route::get('add/user',[AdminController::class,'AddUser'])->name('add.user');
    Route::post('user/store',[AdminController::class,'UserStore'])->name('user.store');
    Route::get('user/delete/{id}',[AdminController::class,'UserDelete'])->name('user.delete');



 


 
});

Route::group(['prefix'=>'user','middleware' =>['user','auth'],'namespace'=>'user'], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');

      // profile
    Route::post('profile/update', [ProfileController::class, 'UdateProfile'])->name('profile.update');
    Route::get('image', [ProfileController::class, 'Image'])->name('image');
    Route::post('image/update', [ProfileController::class, 'ImageUpdate'])->name('image.update');
    Route::get('change/password', [ProfileController::class, 'ChangePassword'])->name('change.password');
    Route::post('password/store', [ProfileController::class, 'PasswordStore'])->name('password.store');
});