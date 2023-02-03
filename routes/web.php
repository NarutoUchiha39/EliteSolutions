<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;

Route::get('/', [UserController::class,'show']);
Route::get('/solutions',[UserController::class,'Solutions']);