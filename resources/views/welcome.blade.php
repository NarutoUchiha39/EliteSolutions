@extends('Layouts.Master')
@section('content')
<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>

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
    <h3 class="title-text">Why use Elite Solutions?</h3>
    <h5 class="title-text">There are many websites that provide Leetcode <br>solutions, so what makes Elite Solutions stand out? <br>We will provide you with some salient features that <br>make Elite Solutions stand out!</h5>
    </td>
  </div>
  <div style="position:relative;top:-200px;float:right;right:60%">
    <table>
      <tr>
        <td style="width:70px;height:50px">
          <p style="color:white;font-weight:bold;font-size:30px">Learn</p>
        </td>
        <td>
            <div id="app" style="color:white;"></div>
        </td>
      </tr>
    </table>
</div>
  
      
</section>
    <section id="features">

    <div class="aspect-ratio-container">
     
        <div class="aspect-ratio-item pos-left">
            <div class="card" data-aos="fade-left">
                <img class="card-image" src="{{asset("/Assets/images/bgc1.png")}}"/>
                <h4>Requesting Problems</h4>
                <p>Stuck with a problem that is not on our<br>website? Just send us your problem and our<br>team will provide you with a solution!</p>
                <button class="btn">Request<br>Problem=></button>
            </div>
        </div>
        <div class="Line1"></div>
        <div class="Line2"></div>

        <div class="aspect-ratio-item pos-right" data-aos="fade-right">
            <div class="card">
                <img class="card-image" src="{{asset("/Assets/images/bgc1.png")}}"/>
                <h4>User Satisfaction</h4>
                <p>We are constantly on lookout for<br>complains and suggestions. Feel free to<br>reach us!</p>
                <button class="btn">Contact Us =></button>
            </div>
        </div>
        <div class="Line3"></div>
        <div class="Line4"></div>
        
        <div class="aspect-ratio-item pos-left" id="Card1" data-aos="fade-left">
            <div class="card" >
                <img class="card-image" src="{{asset("/Assets/images/bgc1.png")}}"/>
                <h4>Post your own solution</h4>
                <p>Think your solution is more optimized<br>than ours? Feel free to send your solution<br>and it may be featured on our website!</p>
                <button class="btn">Post your<br>solution > =></button>
            </div>
        </div>
        <div class="Line5"></div>
        <div class="Line6"></div>
        <div class="aspect-ratio-item pos-right" id="Card2" data-aos="fade-right">
            <div class="card">
                <img class="card-image" src="{{asset("/Assets/images/bgc1.png")}}"/>
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
      console.log(app)
      var typewriter = new Typewriter(app, {
        loop: true,
        delay: 75,
      });

      typewriter
        .pauseFor(2500)
        .typeString('A simple yet powerful native javascript')
        .pauseFor(300)
        .deleteChars(10)
        .typeString('<strong>JS</strong> plugin for a cool typewriter effect and ')
        .typeString('<strong>only <span style="color: #27ae60;">5kb</span> Gzipped!</strong>')
        .pauseFor(1000)
        .start();
    </script>
  


@endsection
