<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ColorController;
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



