<?php
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\SendSolution;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
        Mail::to('prolaraveldevelopers@gmail.com')->send(new SendSolution($code_decode,strip_tags(\Illuminate\Support\Str::of($intution_decode)->markdown())));
        
});
Route::get('/solution',[UserController::class,'solution']);

Route::get('/SolutionPage/{id}',function($id){
        if(Session::has('loginId')){
                $name = Session::get('Email');
                $title = $id;
                if(count(DB::select("select user_email from custom__auth_questions where exists(select user_email from custom__auth_questions where user_email='$name' and question_name = '$title')"))==0)
                {
                        DB::update("update  custom__auths set solved = solved+1 where email='$name'");
                        DB::insert("insert into custom__auth_questions(user_email,question_name) values('$name','$title')");
                }
          
        }
        $var = ["Data"=>DB::select("select DESCRIPTION from questions where title='$id' "),"title"=>$id,"popularity"=>DB::select("select likes,dislikes from questions where title='$id'"),"Difficulty"=>DB::select("select difficulty from questions where title='$id' ")];
        DB::disconnect('mysql');
       return view('SolutionPage',$var);

});

Route::post('/Likes',function(){
        $obj = request('like');
        $title = $obj['title'];
        if($obj['data']=='Like'){
                DB::update("update questions set likes=likes+1 where title='$title'");
                DB::disconnect('mysql');
        }
});