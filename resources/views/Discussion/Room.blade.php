@extends('Layouts.Master')
@section('content')
<div class="title" style="position: relative;top:100px">
    <p style="color:red">{{$Room_Name}}</p> 
</div>
<script>
    document.title = "Disuss {!! $Room_Name !!}";
</script>
@endsection