@extends('Layouts.Master')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js" integrity="sha512-NCiXRSV460cHD9ClGDrTbTaw0muWUBf/zB/yLzJavRsPNUl9ODkUVmUHsZtKu17XknhsGlmyVoJxLg/ZQQEeGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="{{asset('/Assets/CSS/SendSolution.css')}}">
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.5.0/themes/prism.min.css"
/>
<div class="title1" style="color:white;">
    <div class="title-text" style="text-align:center;">
        <textarea  placeholder="Type your title here" class="Title-text"></textarea>

    </div>
</div>
    <div class="code" >
        <div class="NormalCode">
            <p class="PreRenderedMarkDown"># intution</p>
            <textarea onkeyup="textAreaAdjust(this)" style="overflow:hidden" class="intution" placeholder="Type your intuition here"></textarea>
            <p class="PreRenderedMarkDown"># Used Language</p>
            <textarea onkeyup="textAreaAdjust(this)" style="overflow:hidden" class="Language" placeholder="Languages supported: java, C++, Python"></textarea>
            <p class="PreRenderedMarkDown"># code</p>
            <textarea onkeyup="textAreaAdjust(this)" style="overflow:hidden" class="code1" placeholder="Type your code here"></textarea>
        </div>
        <div></div>
        <div class="MarkDown1">
            <h1 class="Text">Intution</h1>
            <div class="intutionMd"></div>
            <h1 class="Text">Code</h1>
            <pre>
                <code id="Tf" class="language-python">
                </code>
            </pre>
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
        
    
        markdown = document.getElementsByClassName("Language")[0].value;
        var block = document.getElementById('Tf');
        block.classList.remove('language-python')
        block.classList.add(`language-${markdown}`)

        markdown = document.querySelector(".code1").value;
        axios.post("/SendSolution",{markdown})
        .then(response=>{
            block = document.getElementById('Tf')
            block.innerHTML = response.data
            Prism.highlightElement(block);
        })
    }
    
    let init=()=>{
        setInterval(convert, 10000);
    }
  
    
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/prism.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-python.min.js"></script>

@endsection
