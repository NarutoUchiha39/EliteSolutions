@extends('Layouts.Master')
@section('content')
<link rel="stylesheet" href="{{asset('/Assets/CSS/Discussion.css')}}"/>
<link rel="stylesheet" href="{{asset('Assets/CSS/table.css')}}">

<div class="search" style="width:100%;position: relative;top:100px;display:flex;justify-content:center;align-items:center;">
    <div class="bar">
      <input type="text"  placeholder="Search Questions" id="text" onkeyup="SearchBar(this)">
      <i class="fa-solid fa-filter" style="color: greenyellow;margin-right:15px;cursor:pointer" onclick="filter()"></i>
      <button id="btn"><img src="{{asset('/Assets/images/search.png')}}"/></button>
      
    </div>
    
  </div>
    <div class="rooms" style="position: relative;top:100px;margin-top:50px">
        <div class="sideBar">
            <p >Topics :</p> 
            <p onclick="Search(this)">All</p>
           @foreach ($rooms as $room)
               <p onclick="Search(this)">{{$room->Topic}}</p>
           @endforeach
        </div>
        <div class="container">
            <button><a href="{{Route('CreateRoom')}}" style="text-decoration:none;color:black"> Create Room </a></button>
        
            @foreach ($rooms as $room)
            <div class="Rooms">
                    <p style="color:white">@ {{$room->Host}}</p>
                    <p style="color:white"> <a href="/Discussion/{{$room->Name}}" style="color:white"> {{$room->Name}}</a></p>
                    <small style="color:white">Topic : </small><small style="color:white" class="topic">{{$room->Topic}}</small>
                    @if ($room->Host == Session::get('Email'))
                        <button><a href="/updateRoom/{{$room->Name}}">Update thread</a> </button>
                        <button><a href="">Delete thread</a> </button>
                    @endif
                    
                    
                    <hr>
                </div>
                @endforeach
            
        </div>
    </div>
<script>
    document.title = 'Discuss'
    
</script>
@endsection