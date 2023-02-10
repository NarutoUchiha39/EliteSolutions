<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
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
        return view('ContactUs');
    }

    public function Mail(Request $request){
        Mail::to('prolaraveldevelopers@gmail.com')->send(new ContactUs($request));
        return redirect('/ContactUs');
         
    }
}

