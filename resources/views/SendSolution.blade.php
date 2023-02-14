@extends('Layouts.Master')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js" integrity="sha512-NCiXRSV460cHD9ClGDrTbTaw0muWUBf/zB/yLzJavRsPNUl9ODkUVmUHsZtKu17XknhsGlmyVoJxLg/ZQQEeGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="{{asset('/Assets/CSS/SendSolution.css')}}">

<div class="title1" style="color:white;">
    <div class="title-text" style="text-align:center;">
        <textarea  placeholder="Type your title here" class="Title-text"></textarea>

    </div>
</div>
    <div class="code" >
        
        <div class="NormalCode">
            <p class="PreRenderedMarkDown"># intution</p>
            <textarea onkeyup="textAreaAdjust(this)" style="overflow:hidden" class="intution" placeholder="Type your intuition here"></textarea>
            <p class="PreRenderedMarkDown"># Approach</p>
            <textarea onkeyup="textAreaAdjust(this)" style="overflow:hidden" class="Approach" placeholder="Type your approach here"></textarea>
            <p class="PreRenderedMarkDown"># code</p>
            <textarea onkeyup="textAreaAdjust(this)" style="overflow:hidden" class="code1" placeholder="TYpe your code here"></textarea>
        </div>
        <div></div>
        <div class="MarkDown1">
            <h1 class="Text">Intution</h1>
            <div class="intutionMd"></div>
            <h1 class="Text">Approach</h1>
            <div class="ApproachMd"></div>
            <h1 class="Text">Code</h1>
            <div class="codeMd"></div>
           
        </div>
</div>
<br>
<br>
<br>
<br>
<br>
<div style="margin-top:-15px">
    <button class="btn1"><b>Send your solution</b> </button>
</div>
<br>
<br>

<script>
    function textAreaAdjust(element) {
    element.style.height = "10vh";
    element.style.height = (25+element.scrollHeight)+"px";
    }

    function convert(){
        let markdown = document.querySelector(".intution").value;

        axios.post("/SendSolution",{markdown})
        .then(response=>{
            document.querySelector(".intutionMd").innerHTML=response.data;
        })
        

        markdown = document.querySelector(".Approach").value;

        axios.post("/SendSolution",{markdown})
        .then(response=>{
            document.querySelector(".ApproachMd").innerHTML=response.data;
        })

        markdown = document.querySelector(".code1").value;

        axios.post("/SendSolution",{markdown})
        .then(response=>{
            document.querySelector(".codeMd").innerHTML=response.data;
        })
    }
    
    let init=()=>{
        setInterval(convert, 10000);
    }
  
    
</script>

@endsection
