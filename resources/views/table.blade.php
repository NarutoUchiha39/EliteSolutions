@extends('Layouts.Master')
@section('content')
<link rel="stylesheet" href="{{asset('Assets/CSS/table.css')}}">
<table class="content-table" style="margin-top:100px">
    <thead>
      <tr>
        <th>Sr.no</th>
        <th>Topic name</th>
        <th>Status</th>
        <th>Question name</th>
        <th>Difficulty</th>
        <th>Languages available</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($Questions as $Question)
      <tr class="passive-row">
        <td>{{$Question['id']}}</td>
        <td>{{$Question['category']}}</td><td><i class="fas fa-check-square fa-2x"></i></td>
        <td><a href="{{$Question['url']}}">{{$Question['title']}}</a></td>
        <td>{{$Question['difficulty']}}</td>
        <td>
          <a href="#"><img  src="{{asset('Assets/images/python.png')}}" alt="python" ></a>
          <a href="#"><img  src="{{asset('Assets/images/java.png')}}" alt="java"></a>
          <a href="#"><img  src="{{asset('Assets/images/cpp.png')}}" alt="cpp"></a>
        </td>
      </tr>          
      @endforeach
      
    </tbody>
</table>
@endsection
