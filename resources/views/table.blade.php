@extends('Layouts.Master')
@section('content')
<link rel="stylesheet" href="{{asset('Assets/CSS/table.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js" integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="search" style="width:100%;position: relative;top:100px;display:flex;justify-content:center;align-items:center;">
  <div class="bar">
    <input type="text"  placeholder="Search Questions" id="text" onkeyup="search()">
    <i class="fa-solid fa-filter" style="color: greenyellow;margin-right:15px;cursor:pointer" onclick="filter()"></i>
    <button id="btn"><img src="{{asset('/Assets/images/search.png')}}"/></button>
    
  </div>
  
</div>

<table class="content-table" style="margin-top:120px">
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
        @if (Session::has('loginId'))
        <tr class="passive-row">
          <td>{{$Question['id']}}</td>
              <td>{{$Question['category']}}</td>
              @if ($solved==0)
                <td><i class="fa-regular fa-square fa-2x"></i></td>
              @else
                @if(in_array($Question['title'],$Question_List,true))
                  <td><i class="fas fa-check-square fa-2x"></i></td>
                
                @else
                {
                  <td><i class="fa-regular fa-square fa-2x"></i></td>
                }  
                @endif
              @endif
              
              <td>{{$Question['title']}}</td>
              <td>{{$Question['difficulty']}}</td>
              <td>
                <a href="/SolutionPage/{{$Question['title']}}-python"><img  src="{{asset('Assets/images/python.png')}}" alt="python" ></a>
                <a href="/SolutionPage/{{$Question['title']}}-java"><img  src="{{asset('Assets/images/java.png')}}" alt="java"></a>
                <a href="/SolutionPage/{{$Question['title']}}-cpp"><img  src="{{asset('Assets/images/cpp.png')}}" alt="cpp"></a>
              </td>
          </tr>
        @else
          <tr class="passive-row1">
            <td>{{$Question['id']}}</td>
            <td>{{$Question['category']}}</td><td><i class="fa-regular fa-square fa-2x"></i></td>
            <td>{{$Question['title']}}</td>
            <td>{{$Question['difficulty']}}</td>
            <td>
                <a href="/SolutionPage/{{$Question['title']}}-python"><img  src="{{asset('Assets/images/python.png')}}" alt="python" ></a>
                <a href="/SolutionPage/{{$Question['title']}}-java"><img  src="{{asset('Assets/images/java.png')}}" alt="java"></a>
            </td>
          </tr>
        @endif         
      @endforeach
      
    </tbody>
</table>
<script src="{{asset('/Assets/JS/Sort.js')}}"></script>
<script defer>
  var elements = document.querySelectorAll('img')
  elements.forEach((element)=>{
    element.addEventListener('click',()=>{
      
            element.parentNode.parentNode.parentNode.cells[2].innerHTML = '<i class="fas fa-check-square fa-2x"></i>'
    }) 
})
</script>
@endsection
