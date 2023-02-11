@extends('Layouts.Master')

@section('content')
<link rel="stylesheet" href="{{asset('/Assets/CSS/Auth.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@if ($errors->any())
    <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <script>alert(`{{$error}}`)</script>
              @endforeach
          </ul>
      </div>
    @endif
<div class="container">
   
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img class="backImg" src="https://cdn.pixabay.com/photo/2018/01/31/07/36/sunset-3120484_960_720.jpg" alt="">
        <div class="text">
          <span class="text-1">Helping you grow<br> stronger each day</span>
          <span class="text-2">Let's code together</span>
        </div>
      </div>
      
    </div>
    <div class="forms">
    <div class="form-content">
             
        <div class="signup-form" >
         
          <div class="title">Log in</div>
          <form action="{{route('Login')}}" method="post">
            @csrf
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="email" type="text" value="{{old('email')}}" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input name="password" type="password" placeholder="Enter your password" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" value="Sumbit">
              </div>
              <div class="text sign-up-text">Don't have an account? <a href="/signup" style="color: blue"> Sign Up now</a></div>
            </div>
        </form>
        </div>
    </div>
@endsection