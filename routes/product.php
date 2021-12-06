<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\AssetsManagementController;
use App\Http\Controllers\CategoryController;


Route::prefix('admin')->group(function () {
Route::prefix('assets')->group(function () {
Route::get('/',[AssetsController::class,'index'])->name('assets.index');
Route::get('/create',[AssetsController::class,'create'])->name('assets.adding');
Route::post('store',[AssetsController::class,'store'])->name('assets.store');
Route::get('edit/{id}',[AssetsController::class,'edit'])->name('assets.edit'); 
  Route::post('/update{id}', [AssetsController::class,'update'])->name('assets.update');
  Route::get('/delete/{id}', [AssetsController::class,'destroy'])->name('assets.delete');



Route::get('assign-management',[AssetsManagementController::class,'assiging_asset'])->name('assets.assign');
Route::post('store-management',[AssetsManagementController::class,'store_asset'])->name('assets.store.management');
Route::get('/assetAssigning/{id}',[AssetsManagementController::class,'assetAssigning'])->name('assetAssigning');
Route::get('/assinged',[AssetsManagementController::class,'assigned_asset'])->name('assets.assinged');
Route::get('/available',[AssetsManagementController::class,'available_assets'])->name('assets.available');
});
});