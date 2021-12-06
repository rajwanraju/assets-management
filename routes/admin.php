<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\RestPasswordController;
use App\Http\Controllers\Admin\PasswordResetController;
use App\Http\Controllers\CategoryController;


// admin login
Route::get('admin/login',[DashboardController::class,'login']);
Route::post('admin/login',[DashboardController::class,'postlogin'])->name('admin.login');


Route::group(['middleware' => ['auth:admin']], function() {

// admin dashboard
Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');



    //Category Controller
Route::get('/category',[CategoryController::class,'index'])->name('category');
Route::get('/category/getdata',[CategoryController::class,'getData'])->name('category.getData');
Route::get('/category/create',[CategoryController::class,'mainCategory'])->name('category.create');
Route::post('/category/create',[CategoryController::class,'store'])->name('store_category');
Route::get('/category/edit/{category}',[CategoryController::class,'edit'])->name('edit_category');
Route::post('/category/update/{category}',[CategoryController::class,'update'])->name('update_category');
Route::get('/category/delete/{category}',[CategoryController::class,'destroy'])->name('delete_category');

Route::prefix('settings')->group(function () {

        Route::get('/',[AdminController::class,'settings'])->name('settings');
        Route::post('store',[AdminController::class,'settings_store'])->name('settings.store');


        //Users Route

    Route::get('users',[UserController::class,'index'])->name('user.index');
    Route::get('users/create',[UserController::class,'create'])->name('users.create');
    Route::post('users/store',[UserController::class,'store'])->name('users.store');
    Route::get('users/getdata',[UserController::class,'getData'])->name('user.getData');
    Route::get('users/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::post('users/update/{id}',[UserController::class,'update'])->name('users.update');
    Route::get('users/delete-user/{id}',[UserController::class,'destroy']);

        //Permission Route
    Route::post('permission/store',[RoleController::class,'permission'])->name('permission.store');

        //Roles Routes
    Route::get('roles',[RoleController::class,'index'])->name('role.index');
    Route::get('roles/create',[RoleController::class,'create'])->name('role.create');
    Route::get('roles/getdata',[RoleController::class,'getData'])->name('role.getData');
    Route::post('roles/store',[RoleController::class,'store'])->name('role.store');
    Route::get('roles/edit/{id}',[RoleController::class,'edit'])->name('role.edit');
    Route::post('roles/update/{id}',[RoleController::class,'update'])->name('role.update');
    Route::get('role/delete-role/{id}',[RoleController::class,'destroy']);

});


Auth::routes(['register' => false]);
Route::get('/404', 'ErrorController@error_404')->name('404');
Route::get('/401', 'ErrorController@error_401')->name('401');


//    password reset
Route::get('/reset/password/{token}', [RestPasswordController::class,'reset_token'])->name('reset.token');
Route::get('/password-reset', [RestPasswordController::class,'index'])->name('reset.password');

Route::post('/password-reset/email', [RestPasswordController::class,'sendEmail'])->name('Password.Reset.Email');
Route::post('/password/reset', [RestPasswordController::class,'password_reset'])->name('Password.Reset.submit');

//password reset
Route::get('/password-change', [PasswordResetController::class,'index'])->name('admin.Password.change');
Route::post('/password/change', [PasswordResetController::class,'password_change'])->name('admin.Password-change');

});