 @extends('layouts.main-layout')

@section('title')
    <title> {{$person -> firstName}} {{$person -> lastName}} </title>
@endsection 

@section('contents')
<div class="row d-flex justify-content-center">
    <div class="d-flex flex-column myItemSingle col-6">
        <h4>{{$person -> firstName}} {{$person -> lastName}}</h4>
        <span>{{$person -> dateOfBirth}}</span>
        <span>{{$person -> height}} cm </span>
        <div class="cmd-single">
            <a href="">
                <i class="fa-solid fa-user-pen"></i>
            </a>
            <a href="{{route('person.delete', $person)}}">
                <i class="fa-solid fa-trash"></i>
            </a>
        </div>
    </div>
</div>

@endsection