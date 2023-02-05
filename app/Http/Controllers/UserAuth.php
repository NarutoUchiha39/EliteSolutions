<?php

namespace App\Http\Controllers;
use App\Models\Custom_Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

   public function user_register(Request $request){
            $request->validate([
                "name"=>"required",
                "email"=>"required|email|unique:custom__auths",
                "password"=>"required|min:5|max:12"
            ]);
            $user = new Custom_Auth();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password= Hash::make($request->password);
            $res = $user->save();
            if($res==1){
      
                return redirect("/");
            }
            
        }

}
