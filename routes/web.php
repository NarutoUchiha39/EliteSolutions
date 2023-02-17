<?php
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\SendSolution;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class,'Home']);
Route::post('Logout',[UserAuth::class,'Logout'])->name('Logout');
Route::get('/signup',[UserAuth::class,'Register']);
Route::get('/login',[UserAuth::class,'Login']);
Route::get('/ContactUs',[UserController::class,'ContactUs']);
Route::post('UserAuth',[UserAuth::class,'user_register'])->name('UserAuth');
Route::post('Mail',[UserController::class,'Mail'])->name('Mail');
Route::post('Login',[UserAuth::class,'user_Login'])->name('Login');
Route::get('/SendSolution',[UserController::class,'SendSolution']);
Route::post('/MarkDown',function(){
        $markdown = request('markdown');
        return \Illuminate\Support\Str::of($markdown)->markdown();
        
});
Route::post('/Details',function(){

        $obj = request('obj');
        $code_decode =  $obj['code'];
        $intution_decode = $obj['intution'];
        
        Mail::to('prolaraveldevelopers@gmail.com')->send(new SendSolution($code_decode,$intution_decode));
        
});
Route::get('/solution',[UserController::class,'solution']);