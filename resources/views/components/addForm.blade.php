<div class="col-12 d-flex justify-content-center">
    <form action="" method="POST" class="flex-column d-flex col-4 my-5">
        @csrf
        <label for="firstName">Nome</label>
        <input type="text" name="firstName">
        <label for="lastName">Cognome</label>
        <input type="text" name="lastName">
        <label for="dateOfBirth">Data di Nascita</label>
        <input type="date" name="dateOfBirth">
        <label for="height">Altezza</label>
        <input type="number" name="height" >
        <div class="btn-group">
            <a href="">
                <button type="submit">
                    <i class="fa-solid fa-square-plus"></i>
                </button>
            </a>
        </div>

    </form>
</div>