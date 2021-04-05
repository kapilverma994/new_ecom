<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.login');
Route::group(['middleware'=>'admin_auth','prefix'=>'admin'],function(){
    Route::get('dashboard',[AdminController::class,'show']);
    Route::get('category/status/{type}/{id}',[CategoryController::class,'status']);
Route::resource('category', CategoryController::class);

Route::get('coupon/status/{type}/{id}',[CouponController::class,'status']);
Route::resource('coupon', CouponController::class);
Route::get('size/status/{type}/{id}',[SizeController::class,'status']);
Route::resource('size', SizeController::class);

    Route::get('admin/logout',function(){
session()->forget('ADMIN_LOGIN');
session()->forget('ADMIN_ID');
return redirect('admin')->with('success','Logout Successfully');
    })->name('admin.logout');

});



