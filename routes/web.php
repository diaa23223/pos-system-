<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeManagementController;
use App\Http\Controllers\trust\PermissionController;
use App\Http\Controllers\trust\RoleController;
use App\Models\EmployeeManagement;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;





Auth::routes();

// change language

Route::get('change-language/{lang}',function($lang){

if(in_array($lang,['en','ar'])){
    Session::put('locale',$lang);
    App::setLocale($lang);
}

return redirect()->back();

})->name('change.language');

// dashboard

Route::get('/',[DashboardController::class , 'index'])->name('dashboard')->middleware('auth');

//permissions

Route::resource('/permissions', PermissionController::class)->except('show');
//roles
Route::resource('/roles', RoleController::class)->except('show');

// categories

Route::resource('/categories',CategoryController::class)->except('show');
//products
Route::resource('/products',ProductController::class);

//users
Route::resource('users', UserController::class)->except('show');

//suppliers

Route::resource('/suppliers', SupplierController::class);

//employee management
Route::resource('/employees', EmployeeManagementController::class);