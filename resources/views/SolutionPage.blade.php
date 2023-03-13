@extends('Layouts.Master')
@section('content')
<link
rel="stylesheet"
href="{{asset('/Assets/CSS/Prism1.css')}}"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js" integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/prism.min.js" integrity="sha512-UOoJElONeUNzQbbKQbjldDf9MwOHqxNz49NNJJ1d90yp+X9edsHyJoAs6O4K19CZGaIdjI5ohK+O2y5lBTW6uQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-python.min.js"></script>
<link rel="stylesheet" href="{{asset('/Assets/CSS/SolutionPage.css')}}">

    <div class="container">
        <div class="code">
            <span class="title"> 55.<span class="heading"> {{$title}}</span></span>
        
            <div class="like">
                @if ($likes[0]->liked==1)
                    <i class="fa-regular fa-thumbs-up" id="likes" onclick="checkLikes(this)" style="cursor:pointer;color:#73D7FF"></i>
                    <div class="likes" style="font-size:20px;margin-left:15px;">{{$popularity[0]->likes}}</div>
                @else
                    <i class="fa-regular fa-thumbs-up" id="likes" onclick="checkLikes(this)" style="cursor:pointer"></i>
                    <div class="likes" style="font-size:20px;margin-left:15px">{{$popularity[0]->likes}}</div>
                @endif
                

            
                <i class="fa-regular fa-thumbs-down" style="margin-left: 30px;cursor:pointer" id="dislikes" onclick="checkDislikes(this)"></i>
                <div class="dislikes" style="font-size:20px;margin-left:15px;margin-top:-3px">{{$popularity[0]->dislikes}} </div>
                @if ( ($Difficulty[0]->difficulty == 'Medium'))
                <img src="{{asset('/Assets/images/medium.png')}}" style="margin-top:0px"/>                
                @endif

                @if ( ($Difficulty[0]->difficulty == 'Easy'))
                <img src="{{asset('/Assets/images/easy.png')}}" style="margin-top:-4px"/>                
                @endif

                @if ( ($Difficulty[0]->difficulty == 'Hard'))
                <img src="{{asset('/Assets/images/hard.png')}}" style="margin-top:0px"/>                
                @endif

            
            </div>
            
            
            <div class="content">
                @foreach ($Data as $d)
                    {!! $d->DESCRIPTION !!}
                @endforeach
            </div>
        </div>
        <div class="solution" style="color:white;line-height: 2;">
            <span class="title">Solution: </span>
            <pre style="background-color:#1C1A1A;color:white;text-shadow:none">
                <code class="language-python" >
                    @php
                        $title = str_replace(' ', '', $title);
                        echo "\n".file_get_contents(dirname(__DIR__) . "/Solutions/KahnAlgo.py");
                    @endphp
                </code>
            </pre>
        </div>
    </div>
    <script>
        function checkLikes(likes) 
        {

            let like = {'data':'Like','title':document.querySelector(".title .heading").textContent}
            axios.post("/Likes",{like}).then((response)=>{
                if(response.data)
                {
                    console.log(response)
                    let val =parseInt(document.querySelector(".likes").textContent)
                    val = val+ 1;
                    document.querySelector(".likes").innerHTML = val.toString()
                    document.querySelector("#likes").style.color = '#73D7FF'
                 }
                 
            })
            
        }
    </script>
@endsection