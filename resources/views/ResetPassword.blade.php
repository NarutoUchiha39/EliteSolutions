@extends('Layouts.Master')

@section('content')


<link rel="stylesheet" href="{{asset('/Assets/CSS/Forget.css')}}">

@if (Session::has('status'))
    @php
        echo "<script>alert('Password reset successfully !!')</script>" 
    @endphp 
@endif

<form action="/ResetPassword/{{$Email}}" method="POST" >
    @csrf
    <div class="container">
        <div class="content">
            <div class="credentials">
                <span style="font-weight:bold;position:relative;left:60%"><i>Reset Password</i> </span>
                <br><br><br><br>
                <label for="Email"  style="margin-right: 3px;">New password: </label>
                <input type="password" id="Email" name="password">
                <br><br><br><br>
                
                <input type="submit" value="Submit" id="submit" class="btn1">
                <br><br><br>
            </div>
            
        </div>
    </div>
</form>

<script>
    document.title = 'Reset Password'
</script>

@endsection