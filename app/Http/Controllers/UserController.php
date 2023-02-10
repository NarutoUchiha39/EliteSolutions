<?php

namespace App\Http\Controllers;

use App\Models\User;

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
}

