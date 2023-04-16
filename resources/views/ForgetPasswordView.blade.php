@extends('Layouts.Master')

@section('content')
<link rel="stylesheet" href="{{asset('/Assets/CSS/Forget.css')}}">
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>alert(`{{$error}}`)</script>
    @endforeach
@endif
@if (Session::has('status'))
    @php
        echo "<script>
                alert('Mail has been sent successfully')
                Window.location = '/'
            </script>"
    @endphp 
@endif

<form action="/ForgetPassword" method="POST" >
    @csrf
    <div class="container">
        <div class="content">
            <div class="credentials">
                <span style="font-weight:bold;position:relative;left:60%"><i>Forget Password</i> </span>
                <br><br><br><br>
                <label for="Email"  style="margin-right: 38px;">Enter Email: </label>
                <input type="email" id="Email" name="Email">
                <br><br><br><br>
                
                <input type="submit" value="Submit" id="submit" class="btn1">
                <br><br><br>
            </div>
            
        </div>
    </div>
</form>

@endsection