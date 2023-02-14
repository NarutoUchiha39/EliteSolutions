<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Session as session;

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
}

