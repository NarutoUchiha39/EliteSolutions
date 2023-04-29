@extends('Layouts.Master')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js" integrity="sha512-NCiXRSV460cHD9ClGDrTbTaw0muWUBf/zB/yLzJavRsPNUl9ODkUVmUHsZtKu17XknhsGlmyVoJxLg/ZQQEeGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="{{asset('/Assets/CSS/SendSolution.css')}}">

<div class="title1" style="color:white;">
    <div class="title-text" style="text-align:center;">
        <textarea  placeholder="Type your title here" class="Title-text" disabled style="cursor: not-allowed">{{$title}}</textarea>

    </div>
</div>
    <div class="code" >
        <div class="NormalCode">
            <p class="PreRenderedMarkDown"># Enter difficulty</p>
            <textarea onkeyup="textAreaAdjust(this);" style="overflow:hidden"  placeholder="type difficulty here" class="difficulty">{{$difficulty}}</textarea>

            <p class="PreRenderedMarkDown"># Enter category</p>
            <textarea onkeyup="textAreaAdjust(this);" style="overflow:hidden"  placeholder="type category here"  class="category">{{$category}}</textarea>

            <p class="PreRenderedMarkDown"># Description</p>
            <textarea onkeyup="textAreaAdjust(this);" style="overflow:hidden" class="code1" placeholder="Type your descrption here">{{$Description}}</textarea>
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
    <button class="btn1" onclick="Register()"><b>Add question</b> </button>
</div>
<br>
<br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.6/axios.min.js" integrity="sha512-06NZg89vaTNvnFgFTqi/dJKFadQ6FIglD6Yg1HHWAUtVFFoXli9BZL4q4EO1UTKpOfCfW5ws2Z6gw49Swsilsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
       async function Register() 
       {
            let title = document.querySelector(".Title-text").value;
            let category = document.querySelector(".category").value;
            let difficulty = document.querySelector(".difficulty").value;
            let desc = document.querySelector(".code1").value
            console.log(desc,title,category,difficulty);
            if(desc.length>0){
                axios.post('/MarkDown',{markdown:desc}).then((response)=>{          
                    desc = response
                    axios.post("/update",{title:title,category:category,difficulty:difficulty,desc:desc,type:"code"}).then((response)=>{
                        alert("Question updated successfully !!")
                        

                    })
            }
            )
            }
       }
        function textAreaAdjust(element) 
        {
            element.style.height = "10vh";
            element.style.height = (25+element.scrollHeight)+"px";
        }
        // function check(element)
        // {
        //     if(element.id=='text'){
        //         if(element.value.length>0){
        //             let ok = document.querySelector(".code1") 
        //             ok.disabled = true
        //             ok.style.cursor = 'not-allowed'
        //         }
        //         else
        //         {
        //             var ok =  document.querySelector(".code1")
        //             ok.disabled = false
        //             ok.style.cursor = 'default'
        //         }
        //     }

        //     else
        //     {
        //         if(element.value.length>0){
        //             document.getElementById("text").disabled = true
        //             document.getElementById("text").style.cursor = 'not-allowed'

        //         }
        //         else
        //         {
        //             document.getElementById("text").disabled = false
        //             document.getElementById("text").style.cursor = 'default'

        //         }

        //     }
        // }
        function AddQuestion() 
        {
            
            text = ""
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
                    axios.post('/MarkDown',{markdown:desc}).then((response)=>{
                        document.getElementById("description").innerHTML = response.data;
                        let code = document.querySelectorAll("code")
                        code.forEach(element => {
                            element.parentNode.style.backgroundColor = "#1C1A1A";
                            Prism.highlightElement(element);
                        });
                    })
                }
            }
            
            else
            {
                document.getElementById("description").innerHTML = ''   
            }
        }
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/prism.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-java.min.js" integrity="sha512-BEknrL2CnuVpqnSTwO4a9y9uW5bQ/nabkJeahZ5seRXvmzAMq59Ja9OxZe3lVGrnKEcVlamL4nUBl03wzPM/nA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-python.min.js"></script>
@endsection