@extends('layouts.main-layout')

@section('title')
    <title>Home Page</title>
@endsection

@section('contents')
    <div class="container d-flex flex-wrap">
        @foreach ($peoples as $person)
            @include('components.person')
        @endforeach 
    </div>
@endsection