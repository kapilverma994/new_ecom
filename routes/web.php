<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
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

Route::resource('category', CategoryController::class);

Route::resource('coupon', CouponController::class);


    Route::get('admin/logout',function(){
session()->forget('ADMIN_LOGIN');
session()->forget('ADMIN_ID');
return redirect('admin')->with('success','Logout Successfully');
    })->name('admin.logout');

});



