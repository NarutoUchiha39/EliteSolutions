<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuth extends Controller
{
   public function Register()
   {
       return view('Auth.Register');
   }

   public function Login()
   {
       return view('Auth.Signin');
   }

}
