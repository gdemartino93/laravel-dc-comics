<div class="col-12 d-flex justify-content-center">
{{-- 
    @if ($errors ->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                    <li> {{$error}} </li>
                @endforeach
            </ul>
        </div>

    @endif --}}
{{-- si potrebbe rendere un componente più dinamico usando gli yield per ogni label/input cosi' da poter usare lo stesso form per più cose (credo) --}}
    <form action="" method="POST" class="flex-column d-flex col-4 my-5 addNew">
        @csrf
        <label for="firstName">Nome</label>
        <input type="text" name="firstName">
        <label for="lastName">Cognome</label>
        <input type="text" name="lastName">
        <label for="dateOfBirth">Data di Nascita</label>
        <input type="date" name="dateOfBirth">
        <label for="height">Altezza</label>
        <input type="number" name="height" >
        <div class="btn-group my-3">
        <button type="submit">
            <i class="fa-solid fa-square-plus"></i>
        </button>
    </form>
</div>