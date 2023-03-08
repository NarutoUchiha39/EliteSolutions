@extends('Layouts.Master')
@section('content')
<link
rel="stylesheet"
href="{{asset('/Assets/CSS/Prism1.css')}}"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/prism.min.js" integrity="sha512-UOoJElONeUNzQbbKQbjldDf9MwOHqxNz49NNJJ1d90yp+X9edsHyJoAs6O4K19CZGaIdjI5ohK+O2y5lBTW6uQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-python.min.js"></script>
<link rel="stylesheet" href="{{asset('/Assets/CSS/SolutionPage.css')}}">

    <div class="container">
        <div class="code">
            <span class="title"> 55. {{$title}}</span>
            <div class="like "><i class="fa-regular fa-thumbs-up"></i><div class="likes" style="font-size:20px;margin-left:15px">{{$popularity[0]->likes}}</div><i class="fa-regular fa-thumbs-down" style="margin-left: 30px;"></i><div class="dislikes" style="font-size:20px;margin-left:15px;margin-top:-3px">{{$popularity[0]->dislikes}} </div></div>
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
                        echo "\n".file_get_contents(dirname(__DIR__) . "/Solutions/$title.py");
                    @endphp
                </code>
            </pre>
        </div>
    </div>
    <script>
        
    </script>
@endsection