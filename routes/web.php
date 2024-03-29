<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PermissionGroupController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserContrller;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Route;

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

Route::name('admin.')->prefix('admin')->middleware(['verified', 'adminverify', 'locale'])->group(function () {
    Route::get('/mail', [UserContrller::class, 'sendMail'])->name('admin.sendmail');
    Route::post('/user/send', [UserContrller::class, 'sendMailUser'])->name('user.send');
    Route::resource('user', UserContrller::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('permission-group', PermissionGroupController::class);
    Route::resource('question', QuestionController::class);
    Route::resource('customer', CustomerController::class);
});

Route::view('contact', 'sessionlist');
Route::view('contact1', 'session');
//Route::post('contact',[Session::class,'postcontact']);

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['throttle:6,1']], function () {
    Route::post('/email/verify/resend', [VerificationController::class, 'resend'])->name('verification.resend');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
});
Route::get('set-locale/{locale}', function ($locale) {
    session()->put('locale', $locale);

    return redirect()->back();
})->middleware('locale')->name('locale.setting');
