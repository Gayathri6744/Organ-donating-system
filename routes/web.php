<?php

use App\Http\Controllers\DesignController;
use App\Http\Controllers\hospitalController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[DesignController::class,'index']);
Route::get('/reg',[DesignController::class,'reg'])->name('reg');
Route::post('/storereg',[UserController::class,'store'])->name('storereg');
Route::get('/logindisplay', [loginController::class, 'logindisplay'])->name('logindisplay');
Route::post('/login', [loginController::class, 'login'])->name('login');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');





Route::get('/adminhome',[DesignController::class,'adminhome'])->name('adminhome');
Route::get('/patienthome',[DesignController::class,'patienthome'])->name('patienthome');
Route::get('/donorhome',[DesignController::class,'donorhome'])->name('donorhome');



Route::get('/hospitalreg',[hospitalController::class,'reg'])->name('hospitalreg');
Route::post('/store_hospital', [hospitalController::class, 'store'])->name('store_hospital');
Route::get('/hospitalhome',[hospitalController::class,'hospitalhome'])->name('hospitalhome');