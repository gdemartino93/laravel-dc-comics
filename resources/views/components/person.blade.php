<div class="d-flex flex-column myItem">
    <a href="{{route('person.singlePerson' , $person)}}">
        <h4>{{$person -> firstName}} {{$person -> lastName}}</h4>
        <span>{{$person -> dateOfBirth}}</span>
        <span>{{$person -> height}} cm </span>
    </a>
</div>