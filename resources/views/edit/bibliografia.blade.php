@extends('template')

@section('content')

<?php
    $sql = "SELECT * FROM bibliografias WHERE id = {$id}";
    $conn = mysqli_connect('127.0.0.1', 'root', 'Pdnejoh1029$', 'laravel');
    $query = mysqli_query($conn, $sql);
    $mostrar = mysqli_fetch_array($query)
?>

<form action="/bibliografia/editar" method="post" class="container mt-5">
    @csrf
    <div class="form-floating mb-3" style="visibility: hidden;">
        <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $mostrar['id'] ?>" name="id">
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="titulo" value="<?php echo $mostrar['titulo'] ?>">
        <label for="floatingInput">Título</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="descripcion" value="<?php echo $mostrar['descripcion'] ?>">
        <label for="floatingInput">Descripcion</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="autor" value="<?php echo $mostrar['autor'] ?>">
        <label for="floatingInput">Autor</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="floatingInput" name="anio" value="<?php echo $mostrar['anio'] ?>">
        <label for="floatingInput">Año</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="editorial" value="<?php echo $mostrar['editorial'] ?>">
        <label for="floatingInput">Editorial</label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" name="mostrar" id="flexCheckChecked">
        <label class="form-check-label" for="flexCheckChecked">Mostrar</label>
    </div>
    <button type="submit" class="btn btn-primary mb-5">Update</button>
</form>

@endsection