<?php

namespace App\Http\Controllers;
use App\Models\Custom_Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

    public function user_Login(Request $request){
       
        $request->validate([
            "email"=>"required|email",
            "password"=>"required|min:5|max:12"
        ]);
        $user = Custom_Auth::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
            $request->session()->put(['loginId'=>$user->id,'Email'=>$user->email,'Name'=>$user->name]);
            return redirect('/');}
            else{
                return back()->withErrors(['Wrong password !!']);
            }
        }
        else{
            return back()->withErrors(['Email has not been registered yet!!']);
        }
    }

    public function Logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
