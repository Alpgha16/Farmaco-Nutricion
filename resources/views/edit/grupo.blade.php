@extends('template')

@section('content')

<?php
    $sql = "SELECT * FROM grupos WHERE id = {$id}";
    $conn = mysqli_connect('127.0.0.1', 'root', 'Pdnejoh1029$', 'laravel');
    $query = mysqli_query($conn, $sql);
    $mostrar = mysqli_fetch_array($query)
?>

<form action="/grupos/editar" class="container mt-5" method="post">
    @csrf
    <div class="form-floating mb-3" style="visibility: hidden;">
        <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $mostrar['id'] ?>" name="id">
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="grupo" value="<?php echo $mostrar['grupo'] ?>">
        <label for="floatingInput">Nombre Grupo</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="subgrupo" value="<?php echo $mostrar['subgrupo'] ?>">
        <label for="floatingInput">Nombre Subgrupo</label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" name="mostrar" id="flexCheckChecked">
        <label class="form-check-label" for="flexCheckChecked">Mostrar</label>
    </div>
    <button type="submit" class="btn btn-primary mb-5">Submit</button>
</form>

@endsection