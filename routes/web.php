<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserAuth;
use App\Http\Controllers\UserController;
Route::get('/', [UserController::class,'Home']);

Route::get('/signup',[UserAuth::class,'Register']);
Route::get('/login',[UserAuth::class,'Login']);