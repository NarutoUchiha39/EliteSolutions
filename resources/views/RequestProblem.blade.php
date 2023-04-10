@extends('Layouts.Master')
@section('content')

<link rel="stylesheet" href="{{Asset('/Assets/CSS/CreateRoom.css')}}"/>

        @if (Session::has('status'))
            @php
                echo "<script>alert('Mail sent successfully')</script>"
            @endphp
        @endif

    <form method="post" action="{{Route('request')}}" id="Create">
        @csrf
        <div class="con">
            <div class="input">
                <div class="Input">
                    <label for="Name" id="Room">Enter Title :</label>
                    <input type="text" id="RoomName" name="Name" required>
                </div>
                <div class="Input" style="margin-top:10%">
                    <label for="topic" id="topic1">Link(Optional) :</label>
                    <input type="text" id="topic" name="url">
                </div>

                <div class="Input" style="margin-top:10%">
                    <label for="topic" id="topic1">Enter Category :</label>
                    <input type="text" id="topic" name="category" required>
                </div>

                <div class="Input" style="margin-top:10%">
                    <label for="Description" id="Description">Enter description of problem :</label>
                    <br>
                    <textarea name="Description" id="" cols="40" rows="15" id="Description" style="margin-top:40px"></textarea>
                </div>
                
                <div class="submit" style="margin-bottom: 10%">
                    <button type="submit">Request Problem</button>
                </div>
                </div>
         </div>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

@endsection