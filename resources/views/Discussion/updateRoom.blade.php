@extends('Layouts.Master')
@section('content')

<link rel="stylesheet" href="{{Asset('/Assets/CSS/CreateRoom.css')}}"/>
    <div class="alert alert-danger" style="position: relative;top:100px;color:white;display:flex;justify-content:center;margin-bottom:30px">update {{$Name}}</div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @php
                       echo "<script>alert('$error')</script>"
                @endphp
            @endforeach
        @endif

    <form method="post" action="/update/{{$Name}}" id="Create">
        @csrf
        
        <div class="Input">
            <label for="Name">Update thread name</label>
            <input type="text" id="RoomName" name="Name">
        </div>
        <div class="Input">
            <label for="topic">Update topic</label>
            <input type="text" id="topic" name="topic">
        </div>

        <div class="Input">
            <label for="Description" >Update Description</label>
            <br>
            <textarea name="Description" id="" cols="40" rows="10" id="Description" style="margin-top:40px"></textarea>
        </div>

        <div class="submit">
            <button type="submit">Submit form</button>
        </div>
    </form>

@endsection