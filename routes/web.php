<?php
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\SendSolution;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Discussion;
use App\Mail\request_problem;
use Illuminate\Http\Request;
use App\Mail\ForgetPassword;

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
        $likes=array(0=>new stdClass());
        $likes[0]->liked = 0;
        $likes[0]->disliked = 0;
        $array = explode('-',$id);
        $id = $array[0];
        $language =$array[1];
        if(Session::has('loginId')){
                $name = Session::get('Email');
                $title = $id;
                
                if(count(DB::select("select user_email from custom__auth_questions where exists(select user_email from custom__auth_questions where user_email='$name' and question_name = '$title')"))==0)
                {
                        DB::update("update  custom__auths set solved = solved+1 where email='$name'");
                        DB::insert("insert into custom__auth_questions(user_email,question_name) values('$name','$title')");
                        
                }
                $likes=DB::select("select liked,disliked from custom__auth_questions where user_email='$name' and question_name='$title'");
              
          
        }
        $var = ["Data"=>DB::select("select DESCRIPTION from questions where title='$id' "),"title"=>$id,"popularity"=>DB::select("select likes,dislikes from questions where title='$id'"),"Difficulty"=>DB::select("select difficulty from questions where title='$id' "),"likes"=>$likes,"language"=>$language];
        DB::disconnect('mysql');
       return view('SolutionPage',$var);

});

Route::post('/Likes',function(){
        $obj = request('like');
        $title = $obj['title'];
        $mail = Session::get('Email');
        if(Session::has('loginId') )
        {
                if($obj['data']=='Like'){
                        if(DB::select("select liked from custom__auth_questions where user_email='$mail' and question_name='$title'")[0]->liked==0){
                        DB::update("update questions set likes=likes+1 where title='$title'");
                        DB::update("update custom__auth_questions set liked=1 where user_email='$mail' and question_name='$title'");
                        DB::disconnect('mysql');
                        return 'true';}
                }

                if($obj['data']=='DisLike')
                {
                        
                        if(DB::select("select disliked from custom__auth_questions where user_email='$mail' and question_name='$title'")[0]->disliked==0){
                                DB::update("update questions set dislikes=dislikes+1 where title='$title'");
                                DB::update("update custom__auth_questions set disliked=1 where user_email='$mail' and question_name='$title'");
                                DB::disconnect('mysql');
                                return 'true';}
                }
        }
       
        return 'false';
       
});

// Route::get('/Discussion',[Discussion::class,'discuss']);
// Route::get('/Discussion/{id}',[Discussion::class,'SpecificRoom']);
Route::get('/RequestProblem',[Discussion::class,'CreateRoom'])->name('RequestProblem');
// Route::post('/RegisterRoom',[Discussion::class,'RegisterRoom'])->name('RegisterRoom');
// Route::get('/updateRoom/{id}',[Discussion::class,'updateRoom']);
// Route::post('/update/{id}',[Discussion::class,'update'])->name('update');
// Route::get('/deleteRoom/{id}',[Discussion::class,'deleteRoom']);
Route::post('/request',function(Request $request){
        if($request->Description){
                $Description = $request->Description;
        }

        else{
                $Description = '';
        }

        if($request->url){
                $url = $request->url;
        }

        else
        {
                $url = '';
        }

        Mail::to('prolaraveldevelopers@gmail.com')->send(new request_problem($url,$Description,$request->Name,$request->category));
        return redirect()->back()->with('status','success');
})->name('request');

Route::post('/ForgetPassword',function(Request $request)
{
        Mail::to($request->Email)->send(new ForgetPassword(['title'=>'Request to recover password']));
        return redirect()->back()->with('status','success');
});

Route::get('/FPV',function(){return view('ForgetPasswordView');});