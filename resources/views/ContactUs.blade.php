@extends('Layouts.Master')
@section('content')
<link rel="stylesheet" href="{{asset("/Assets/CSS/ContactUs.css")}}">

    <div class="container">
        <span class="big-circle"></span>
        <img src="{{asset('Assets/images/shapes.png')}}" class="square">
        <div class="form">
            
            <div class="contact-info">
                <div class="title">Tell us your thoughts</div>
                <p class="text">Your opinion helps us grow and learn. Share your thoughts with us here</p>
                <div class="info" >
                    <div class="information"  >
                        <i class="fa fa-envelope fa-2x" style="color:#1abc9c;margin-right:20px"></i>
                        <p style="text-decoration:none;color:black">Example@gmail.com</p>
                    </div>
                    
                    <div class="information" style="margin-top:50px">
                        <i class="fa-brands fa-github fa-2x" style="color:#1abc9c;margin-right:20px"></i>
                        <a style="text-decoration:none;color:black" href="https://github.com/NarutoUchiha39">NarutoUchiha39</a>
                    </div>
                    
                </div>
            </div>
            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>
                <form action="">
                    
                    <h3 class="title">Contact Us</h3>
                    <div class="input-container">

                        <input type="text" name="Name" class="input" id="Name">
                        <label for="Name">Name</label>
                        <span>Name</span>
                    </div>
                        
                    <div class="input-container">
                       
                        <input type="email" name="email" class="input" id="Email">
                        <label for="Email">Email </label>
                        <span>Email</span>
                    </div>

                    <div class="input-container textarea ">
                       
                        <textarea name="message" class="input" id="message"></textarea>
                        <label for="message">Message </label>
                        <span>Message</span>
                    </div>
                        
                    
                    <input type="submit" value="send" class="btn1">
                </form>
            </div>

        </div>
    </div>
    <script src="{{asset('Assets/JS/ContactUs.js')}}"
@endsection