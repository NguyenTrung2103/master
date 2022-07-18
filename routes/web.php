<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserContrller;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Session;
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


Route::name('admin.')->prefix('admin')->group(function () {
    Route::resource('user', UserContrller::class); 
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
});

Route::prefix('session')->group(function () {
    Route::get('get', 'SessionControllers@getSession'); 
    Route::get('set', 'SessionControllers@setSession');
    Route::get('unset', 'SessionControllers@unsetSession');
});
Route::view('session','session');
Route::post('user', [Session::class,'login']);
Route::view('sessionlist','sessionlist');    

Route::view('contact','sendmail');
Route::post('contact',[Session::class,'postcontact']);
