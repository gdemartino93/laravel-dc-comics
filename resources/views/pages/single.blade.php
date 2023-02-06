 @extends('layouts.main-layout')

@section('title')
    <title> {{$person -> firstName}} {{$person -> lastName}} </title>
@endsection 

@section('contents')
<div class="row d-flex justify-content-center">
    <div class="d-flex flex-column myItemSingle col-6">
        <h4>{{$person -> firstName}} {{$person -> lastName}}</h4>
        <h5>{{$person -> dateOfBirth}}</h5>
        <h5>{{$person -> height}} cm </h5>
        <div class="cmd-single">
            <a href="{{route('person.goToEditForm' , $person)}}">
                <i class="fa-solid fa-user-pen"></i>
            </a>
            <a href="{{route('person.delete', $person)}}">
                <i class="fa-solid fa-trash"></i>
            </a>
        </div>
    </div>
</div>

@endsection