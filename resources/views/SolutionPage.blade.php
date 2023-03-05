@extends('Layouts.Master')
@section('content')
<style>
    code
    {
        font-size: 17px;
        
    }
</style>
   <div class="" style="color: white;margin-top:100px;margin-left:20px">
        @foreach ($Data as $d)
        {!! $d->DESCRIPTION !!}
            
        @endforeach
    </div>
@endsection