@extends('Layouts.Master')
@section('content')
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
        <div class="solution">
            hi
        </div>
    </div>
@endsection