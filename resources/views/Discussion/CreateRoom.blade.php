@extends('Layouts.Master')
@section('content')

<link rel="stylesheet" href="{{Asset('/Assets/CSS/CreateRoom.css')}}"/>
        @if ($errors->any())
        <div class="alert alert-danger" style="top:100px">
            <ul>
                @foreach ($errors->all() as $error)
                    @php
                       echo "<script>alert('$error')</script>"
                    @endphp
                
                @endforeach
            </ul>
        </div>
        @endif
    <form method="post" action="{{Route('RegisterRoom')}}" id="Create">
        @csrf
        
        <div class="Input">
            <label for="Name">Enter Room name</label>
            <input type="text" id="RoomName" name="Name">
        </div>
        <div class="Input">
            <label for="topic">Enter topic</label>
            <input type="text" id="topic" name="topic">
        </div>

        <div class="Input">
            <label for="Description" >Enter Description</label>
            <br>
            <textarea name="Description" id="" cols="40" rows="10" id="Description" style="margin-top:40px"></textarea>
        </div>

        <div class="submit">
            <button type="submit">Submit form</button>
        </div>
    </form>

@endsection