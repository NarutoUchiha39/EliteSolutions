@extends('Layouts.Master')
@section('content')
<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
<link rel="stylesheet" href="{{asset('/Assets/CSS/Home.css')}}">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<section id="title">
  <h1 class="title-text">Your one stop solution <br>
      to <span id="colored">Leetcode problems.</span></h1>

  <p class="title-text">A dedicated platform for getting the most optimized and <br>handpicked solutions for Leetcode problems.</p>
  <div class="pos-button">
  <button class="btn" style="margin-bottom:20%" >Create account</button>
  </div>
  <div class="Shapes">
  <div  class="Ellipse5"></div>
  <div  class="Ellipse6"></div>
  <div  class="Ellipse4"></div>
  <div  class="Ellipse3"></div>
  <div  class="Ellipse2"></div>
  <div  class="Ellipse1"></div>
  </div>

  <div data-aos="fade-up-right" style="margin-bottom:90px">
    <img class="img" src="{{asset('/Assets/images/coding.gif')}}" style="float:right"/>
    <h3 class="title-text">Why use Elite Solutions?</h3>
    <h5 class="title-text">There are many websites that provide Leetcode <br>solutions, so what makes Elite Solutions stand out? <br>We will provide you with some salient features that <br>make Elite Solutions stand out!</h5>

  </div>
  <br>
<br>
<br>
<br>
<br>
<br>
<br>
  <div style="position:relative;top:-200px;float:right;right:40%;text-align:center;">
    <table>
      <tr>
        <td style="width:170px;height:50px">
          <p style="color:white;font-weight:bold;font-size:40px">Learn</p>
        </td>
        <td>
          <div id="app" style="color:white;font-weight:bold;font-size:40px;margin-top:10px"></div>
        </td>
      </tr>
    </table>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
      
</section>
    <section id="features">

    <div class="aspect-ratio-container">
     
        <div class="aspect-ratio-item pos-left"  data-aos="fade-left">
            <div class="card">
                <img class="card-image" src="{{asset("/Assets/images/bgc2.jpg")}}"/>
                <h4>Requesting Problems</h4>
                <p>Stuck with a problem that is not on our<br>website? Just send us your problem and our<br>team will provide you with a solution!</p>
                <button class="btn">Request<br>Problem=></button>
            </div>
        </div>
        <div class="requestProblemsText" style="position:relative;float:right;text-align:right">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum libero quos neque nostrum tempore non dignissimos quidem cumque, enim, nemo ipsum, quis sit nesciunt? Qui iste illo corrupti dolor ratione!
        </div>
        <div class="Line1"></div>
        <div class="Line2"></div>

        <div class="aspect-ratio-item pos-right" data-aos="fade-right">
            <div class="card">
                <img class="card-image" src="{{asset("/Assets/images/bgc2.jpg")}}"/>
                <h4>User Satisfaction</h4>
                <p>We are constantly on lookout for<br>complains and suggestions. Feel free to<br>reach us!</p>
                <button class="btn">Contact Us =></button>
            </div>
        </div>
        <div class="Line3"></div>
        <div class="Line4"></div>
        
        <div class="aspect-ratio-item pos-left" id="Card1" data-aos="fade-left">
            <div class="card" >
                <img class="card-image" src="{{asset("/Assets/images/bcg3.jpg")}}"/>
                <h4>Post your own solution</h4>
                <p>Think your solution is more optimized<br>than ours? Feel free to send your solution<br>and it may be featured on our website!</p>
                <button class="btn">Post your<br>solution > =></button>
            </div>
        </div>
        <div class="Line5"></div>
        <div class="Line6"></div>
        <div class="aspect-ratio-item pos-right" id="Card2" data-aos="fade-right">
            <div class="card">
                <img class="card-image" src="{{asset("/Assets/images/bcg3.jpg")}}"/>
                <h4>Optimized Solutions</h4>
                <p>With our solutions you will be rest assured<br>that you will be undetrstanding the most<br>optimal approach to the various problems.</p>
                <button class="btn">Solutions =></button>
            </div>
        </div> 
    </div>
  
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
      var app = document.getElementById('app');
      var typewriter = new Typewriter(app, {
        loop: true,
        delay: 275,
      });

      typewriter.typeString("Linked List").deleteAll().typeString("Graphs").deleteAll().typeString("Trees").deleteAll().typeString("Arrays").deleteAll().typeString("Data Structures").start()
    </script>
  


@endsection
