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
        <img class="backImg" src="https://media.istockphoto.com/id/1224614437/vector/woman-with-headphone-and-computer-call-center-customer-service-and-support-flat-vector.jpg?s=612x612&w=0&k=20&c=hVhQcGWrdqkYpV6RfUQmRnRMWKKNnJNzzRV9i40vNFw=" alt="">

      </div>
      
    </div>
    <div class="forms">
    <div class="form-content">
             
        <div class="signup-form" >
         
          <div class="title">Log in</div>
          <form action="{{route('LoginAdmin')}}" method="post">
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
              
              <div class="button input-box">
                <input type="submit" value="Sumbit">
              </div>
             
            </div>
        </form>
        </div>
    </div>
@endsection