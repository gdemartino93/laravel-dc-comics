@extends('layouts.main-layout')

@section('title')
    <title>Home Page</title>
@endsection

@section('contents')
    <div class="wrapper d-flex">
        <div class="container">
            @foreach ($peoples as $person)
                @include('components.person')
            @endforeach 
        </div>
    </div>
@endsection