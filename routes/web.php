<?php

use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
});
#route của danh mục
Route::get('categorys/deleted', [CategoryController::class, 'deleted'])->name('categorys.deleted');
Route::put('categorys/{category}/restore', [CategoryController::class, 'restore'])->name('categorys.restore');
Route::resource('categorys',CategoryController::class);

#route của màu
Route::get('colors/deleted', [ColorController::class, 'deleted'])->name('colors.deleted');
Route::put('colors/{color}/restore', [ColorController::class, 'restore'])->name('colors.restore');
Route::resource('colors',ColorController::class);

#route của size
Route::get('sizes/deleted', [SizeController::class, 'deleted'])->name('sizes.deleted');
Route::put('sizes/{size}/restore', [SizeController::class, 'restore'])->name('sizes.restore');
Route::resource('sizes',SizeController::class);

#route của brand
Route::get('brands/deleted', [BrandController::class, 'deleted'])->name('brands.deleted');
Route::put('brands/{brand}/restore', [BrandController::class, 'restore'])->name('brands.restore');
Route::resource('brands',BrandController::class);


#route của product
Route::resource('products', ProductController::class);
