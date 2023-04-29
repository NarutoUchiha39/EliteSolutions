@extends('Layouts.Master')
@section('content')
<link rel="stylesheet" href="{{asset('Assets/CSS/table.css')}}">
<link rel="stylesheet" href="{{asset('Assets/CSS/Admin.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js" integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="button" style="display:flex;align-items:center;justify-content:center">
    <button style="position: relative;top:100px;border: none;outline:none;background-color:#FF4500;border-color:#FF8C66;padding:5px;border-radius:10px;color:white;cursor: pointer;" onclick="AddQuestion()"> <p style="font-size:15px">Add question</p></button>
</div>

<table class="content-table" style="margin-top:120px">
    <thead>
        <th style="width: 50%">Question name</th>
        <th style="width: 50%">Admin options</th>
    </thead>
    <tbody>
      @foreach ($Questions as $Question)
        <tr class="passive-row">
              <td style="text-align:left;padding:10px">{{$Question->title}}</td>
              <td><i class="fa fa-trash" aria-hidden="true" style="color: red;cursor: pointer;margin-right:20%" onclick="delete1(this)" id="{{$Question->title}}"></i><i class="fa fa-refresh" aria-hidden="true" style="cursor: pointer" onclick="window.location = '/change/{{$Question->title}}'"></i></td>
              
        </tr>
      @endforeach
      
    </tbody>
</table>
<script>
    function AddQuestion()
    {
        window.location = '/QuestionAdd'
    }
    function delete1(element)
    {
        let val = confirm(`Do you really want to delete ${element.id} ?`)
        if(val){
            let name = element.id
            axios.post('/Deleteqts',{question:name}).then((response)=>
            {
                alert("Question deleted successfully !!")
            })
        }
        
    }
</script>
@endsection
