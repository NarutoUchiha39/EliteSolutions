<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Custom_Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\Mail\SendSolution;
use Illuminate\Support\Facades\Session as session;
use App\Models\questions;
use App\Models\custom__auth_questions;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function Home()
    {
        return view('welcome');
    }

    public function Solutions(){
        return view('solutions');
    }

    public function ContactUs(){
        if(session::has('loginId')){
            return view('ContactUs');
        }
        else{
            return redirect('/login');
        }
      
    }

    public function Mail(Request $request){
        Mail::to('prolaraveldevelopers@gmail.com')->send(new ContactUs($request));
        return redirect('/ContactUs');
         
    }
    public function SendSolution(){
       
        if(session::has('loginId')){
            return view('SendSolution');
        }
        else{
            return redirect('/login');
        }
    }

    public function solution(){
        if(!session::has('loginId'))
        {
            return view('table',['Questions'=>questions::all()]);
        }
        if(session::has('loginId'))
        {
            $id = session::get('loginId');
            $res = DB::select("select solved from custom__auths where id=$id"); 
            if($res[0]->solved==0){
                return view('table',['Questions'=>questions::all(),'solved'=>0]);
            }
            else{
                $email = session::get('Email'); 
                $user_solved = DB::select("select question_name from custom__auth_questions where user_email = '$email'");
                $array = array();
                for ($i=0; $i < count($user_solved); $i++) { 
                    array_push($array,$user_solved[$i]->question_name);
                }
                for ($i=0; $i < count($array); $i++) { 
                    echo($array[$i]);
                }
                return view('table',['Questions'=>questions::all(),'solved'=>$res[0]->solved,'Question_List'=>$array]);   
            }

        }
    }
}

