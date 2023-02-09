@extends('layouts.main-layout')

@section('title')
    <title> Stai modificando {{$person -> firstName}} {{$person -> lastName}}</title>
@endsection

@section('contents')
<div class="col-12 d-flex justify-content-center">
    {{-- {{route('person.edit',$person)}} --}}
    <form action="" method="POST" class="flex-column d-flex col-4 my-5 addNew">
        @csrf
        @if ($errors ->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors -> all() as $error)
                        <li> {{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for="firstName">Nome</label>
        <input type="text" name="firstName" value="{{$person -> firstName}}">
        <label for="lastName">Cognome</label>
        <input type="text" name="lastName" value="{{$person -> lastName}}">
        <label for="dateOfBirth">Data di Nascita</label>
        <input type="date" name="dateOfBirth" value="{{$person -> dateOfBirth}}">
        <label for="height">Altezza</label>
        <input type="number" name="height" value="{{$person -> height}}">
        <div class="btn-group my-3">
        <button type="submit">
            EDIT
        </button>
    </form>
</div>
@endsection