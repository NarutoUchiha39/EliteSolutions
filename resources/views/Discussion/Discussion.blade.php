@extends('Layouts.Master')
@section('content')
<link rel="stylesheet" href="{{asset('/Assets/CSS/Discussion.css')}}"/>
<link rel="stylesheet" href="{{asset('Assets/CSS/table.css')}}">

<div class="search" style="width:100%;position: relative;top:100px;display:flex;justify-content:center;align-items:center;">
    <div class="bar">
      <input type="text"  placeholder="Search Questions" id="text" onkeyup="globalSearch(this)">
      <i class="fa-solid fa-filter" style="color: greenyellow;margin-right:15px;cursor:pointer" onclick="filter()"></i>
      <button id="btn"><img src="{{asset('/Assets/images/search.png')}}"/></button>
      
    </div>
    
  </div>
    <div class="rooms" style="position: relative;top:100px;margin-top:50px">
        <div class="sideBar">
            <p >Topics :</p> 
            <p onclick="Search(this)">All</p>
           @foreach ($topics as $room)
           <div class="Topics" style="display:flex">
               <p onclick="Search(this)" style="margin-right: 20px">{{$room->Topic}}</p>
               <p>{{$room->total_rooms}}</p>
            </div>
           @endforeach
        </div>
        <div class="container">
            <button><a href="{{Route('CreateRoom')}}" style="text-decoration:none;color:black"> Create Room </a></button>
        
            @foreach ($rooms as $room)
            <div class="Rooms">
                    <p style="color:white" class="Host">@ {{$room->Host}}</p>
                    <p style="color:white"> <a href="/Discussion/{{$room->Name}}" style="color:white" class="RoomName"> {{$room->Name}}</a></p>
                    <small style="color:white">Topic : </small><small style="color:white" class="topic">{{$room->Topic}}</small>
                    @if ($room->Host == Session::get('Email'))
                        <button><a href="/updateRoom/{{$room->Name}}">Update thread</a> </button>
                        <button><a href="/deleteRoom/{{$room->Name}}-{{$room->Topic}}">Delete thread</a> </button>
                    @endif
                    <hr>
                </div>
            @endforeach

        </div>
    </div>
<script>
    document.title = 'Discuss'
    function Search(element)
    {
        search = element.textContent
        console.log(search);
     
        collection = document.getElementsByClassName('topic')
       
        for (let index = 0; index <collection.length; index++) 
        {
            if(collection[index].textContent.indexOf(search)>-1){
                console.log(collection[index].parentNode);
                collection[index].parentNode.style.display = ''
            }
            else
            {
                collection[index].parentNode.style.display = 'none'
            }
        }
    }

    function globalSearch(element) 
    {
       let collection = document.getElementsByClassName("Rooms")
       let toBeSearched = element.value.toLowerCase()

       for (let index = 0; index < collection.length; index++)
       {

            let Topic = collection[index].getElementsByClassName("topic")[0].textContent.toLowerCase()
            let Host = collection[index].getElementsByClassName("Host")[0].textContent.toLowerCase()
            let RoomName = collection[index].getElementsByClassName("RoomName")[0].textContent.toLowerCase()
            if(Topic.indexOf(toBeSearched)>-1 || Host.indexOf(toBeSearched)>-1 || RoomName.indexOf(toBeSearched)>-1)
            {
                collection[index].style.display = ''
                console.log(collection[index]);
            }
            else
            {
                collection[index].style.display = 'none'
            }
       }
    }
    
</script>
@endsection