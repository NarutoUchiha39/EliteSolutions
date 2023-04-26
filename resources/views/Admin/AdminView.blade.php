@extends('Layouts.Master')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js" integrity="sha512-NCiXRSV460cHD9ClGDrTbTaw0muWUBf/zB/yLzJavRsPNUl9ODkUVmUHsZtKu17XknhsGlmyVoJxLg/ZQQEeGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="{{asset('/Assets/CSS/SendSolution.css')}}">
<link
rel="stylesheet"
href="{{asset('/Assets/CSS/Prism1.css')}}"
/>
<div class="title1" style="color:white;">
    <div class="title-text" style="text-align:center;">
        <textarea  placeholder="Type your title here" class="Title-text"></textarea>

    </div>
</div>
    <div class="code" >
        <div class="NormalCode">
            <p class="PreRenderedMarkDown"># Leetcode question name (optional)</p>
            <textarea onkeyup="check(this)" style="overflow:hidden" class="intution" placeholder="type leetcode question name here" id='text'></textarea>
            <p class="PreRenderedMarkDown"># Description</p>
            <textarea onkeyup="check(this)" style="overflow:hidden" class="code1" placeholder="Type your descrption here (Markdown supported)"></textarea>
        </div>
        <div></div>
        <div class="MarkDown1">
            <h2 class="Text">Description</h2>
            <div style="background-color:#1C1A1A;color:white;text-shadow:none;margin-left:15px" id="description">
            </div>
        </div>
</div>
<br>
<br>
<br>
<br>
<br>
<div style="margin-top:-15px">
    <button class="btn1" onclick="AddQuestion()"><b>Preview question</b> </button>

<div style="margin-top:5px;float:right">
    <button class="btn1" onclick=""><b>Add question</b> </button>
</div>
<br>
<br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.6/axios.min.js" integrity="sha512-06NZg89vaTNvnFgFTqi/dJKFadQ6FIglD6Yg1HHWAUtVFFoXli9BZL4q4EO1UTKpOfCfW5ws2Z6gw49Swsilsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function check(element)
        {
            if(element.id=='text'){
                if(element.value.length>0){
                    let ok = document.querySelector(".code1") 
                    ok.disabled = true
                    ok.style.cursor = 'not-allowed'
                }
                else
                {
                    var ok =  document.querySelector(".code1")
                    ok.disabled = false
                    ok.style.cursor = 'default'
                }
            }

            else
            {
                if(element.value.length>0){
                    document.getElementById("text").disabled = true
                    document.getElementById("text").style.cursor = 'not-allowed'

                }
                else
                {
                    document.getElementById("text").disabled = false
                    document.getElementById("text").style.cursor = 'default'

                }

            }
        }
        function AddQuestion() 
        {
            
            text = document.getElementById("text").value
            desc = document.querySelector(".code1").value
            if(desc.length>0 || text.length>0)
            {
                if(text.length>0)
                {
                    axios.post('/InsertQuestion',{Question_Name:text}).then((response)=>{
                        if (!response.data.data.question) 
                        {
                            alert(response.data.errors[0].message);
                        }

                        else
                        {
                            let element  = document.getElementById("description")
                            FinalHTML = response.data.data.question.questionId +'&nbsp'+ '&nbsp'+ response.data.data.question.title + response.data.data.question.content
                            element.innerHTML = FinalHTML
                        }

                        }
                    )
                }

                else
                {
                    axios.post('/MarkDown',{markdown:desc}).then((response)=>{document.getElementById("description").innerHTML = response.data})
                }
            }
            
            else
            {
                document.getElementById("description").innerHTML = ''   
            }
        }
    </script>
@endsection