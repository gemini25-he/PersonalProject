<?php

use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
});

Route::resource('categorys',CategoryController::class);
