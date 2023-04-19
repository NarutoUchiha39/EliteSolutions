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
            <p class="title">Topics :</p> 
            <p onclick="Search(this)">All</p>
            <div class="Topics" style="display:grid;grid-template-columns: 40% 40%;">
                @foreach ($topics as $room)
                        <div class="head">
                                <p onclick="Search(this)" >{{$room->Topic}} &nbsp; ({{$room->total_rooms}})</p>
                        </div>
                        <div class="total" style="margin-bottom: 40px">
                            <p  style="color:white;background-color:#51546f;padding:7px;width:max-content;border-radius:5px;font-size:12px;letter-spacing:1px">Message</p>
                        </div>
                @endforeach
                
            </div>
           
        </div>
        <div class="container">
            <button class="button create" style="padding:10px"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
                <title>add</title>
                <path d="M16.943 0.943h-1.885v14.115h-14.115v1.885h14.115v14.115h1.885v-14.115h14.115v-1.885h-14.115v-14.115z">
                </path>
              </svg><a href="{{Route('CreateRoom')}}" style="text-decoration:none;color: rgba(0, 0, 0, 0.829);position: relative;top:-5px;font-size:15px;font-weight:600;margin-left:10px;left:-5%;">Create Room </a></button>
        
            @foreach ($rooms as $room)
            <div class="Rooms" style="margin-top: 30px">
                    <div class="header" style="display: flex;position: relative;top:-10px;left:-27px">
                        <img src="https://studybud.s3.amazonaws.com/avatar.svg" alt="avatar" srcset="" style="max-width: 40px">
                        <p class="Host">@ {{$room->Host}}</p>
                    </div>
                    <p style="color:white"> <a href="/Discussion/{{$room->Name}}" style="color:white" class="RoomName"> {{$room->Name}}</a></p>
                   
                    <small style="color:white;background-color:#51546f;padding:7px;border-radius:10px;position: relative;top:20px" class="topic">{{$room->Topic}}</small>
                    <br><br>
                    @if ($room->Host == Session::get('Email'))
                        <button><a href="/updateRoom/{{$room->Name}}">Update thread</a> </button>
                        <button><a href="/deleteRoom/{{$room->Name}}-{{$room->Topic}}">Delete thread</a> </button>
                    @endif
               
                </div>
            @endforeach

        </div>
    </div>
<script>
    document.title = 'Discuss'
    function Search(element)
    {
        search = element.textContent.toLowerCase()
       
        collection = document.getElementsByClassName('topic')
       
        for (let index = 0; index <collection.length; index++) 
        {
            if(collection[index].textContent.toLowerCase().indexOf(search)>-1){
               
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