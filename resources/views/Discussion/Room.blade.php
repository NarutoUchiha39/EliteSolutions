@extends('Layouts.Master')
@section('content')
<div class="title" style="position: relative;top:100px">
    <p style="color:red">{{$Room_Name}}</p> 
    <p style="color:red">{{$Description[0]->description}}</p> 
</div>
<script>
    document.title = "Disuss {!! $Room_Name !!}";
</script>
@endsection