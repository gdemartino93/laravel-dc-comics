 @extends('layouts.main-layout')

@section('title')
    <title> {{$person -> firstName}} {{$person -> lastName}} </title>
@endsection 

@section('contents')
<div class="d-flex flex-column myItem">
        <h4>{{$person -> firstName}} {{$person -> lastName}}</h4>
        <span>{{$person -> dateOfBirth}}</span>
        <span>{{$person -> height}} cm </span>
</div>
@endsection