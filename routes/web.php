<?php

use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
});
Route::get('categorys/deleted', [CategoryController::class, 'deleted'])->name('categorys.deleted');
Route::put('categorys/{category}/restore', [CategoryController::class, 'restore'])->name('categorys.restore');

Route::resource('categorys',CategoryController::class);



