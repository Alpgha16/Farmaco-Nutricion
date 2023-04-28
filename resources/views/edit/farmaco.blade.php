@extends('template')

@section('content')

<?php
    $sql = "SELECT * FROM farmacos WHERE id = {$id}";
    $conn = mysqli_connect('127.0.0.1', 'root', 'Pdnejoh1029$', 'laravel');
    $query = mysqli_query($conn, $sql);
    $mostrar = mysqli_fetch_array($query)
?>

<div class="container mt-5">
    <p class="text-center">Imagen del Grupo <?php echo $mostrar['farmaco'] ?></p>
    <img src="/storage/imgFarmacos/<?php echo $mostrar['imagen_url'] ?>" class="rounded mx-auto d-block" alt="Imagen Farmaco <?php echo $mostrar['farmaco'] ?>" height="200">
</div>

<form action="/farmacos/editar" class="container mt-5" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $mostrar['id'] ?>" name="id" hidden>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="nombre" value="<?php echo $mostrar['farmaco'] ?>">
        <label for="floatingInput">Nombre Fármaco</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="mecanismo" value="<?php echo $mostrar['mecanismo'] ?>">
        <label for="floatingInput">Mecanismo</label>
    </div>
    <div class="mb-3">
        <label for="imagen_url" class="form-label">Imagen Farmaco</label>
        <input class="form-control" type="file" name="imagen_url">
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="efecto" value="<?php echo $mostrar['efecto'] ?>">
        <label for="floatingInput">Efecto</label>
    </div>
    <div class="input-group mb-3">
        <select class="form-select" id="inputGroupSelect02" name="grupo">
            <option value="<?php echo $mostrar['id_grupo'] ?>">Conservar Grupo Actual</option>
            <?php
                $sql = 'SELECT * FROM grupos WHERE estatus = 1';
                $conn = mysqli_connect('127.0.0.1', 'root', 'Pdnejoh1029$', 'laravel');
                $query = mysqli_query($conn, $sql);
                while($mostrar3 = mysqli_fetch_array($query)){
            ?>
            <option value="<?php echo $mostrar3['id'] ?>"><?php echo $mostrar3['grupo'] ?></option>
            <?php } ?>
        </select>
        <button class="btn btn-warning" type="button">
            <a href="/view_grupos" style="color:black; text-decoration: none;">Crear Nuevo Grupo</a>
        </button>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" name="mostrar" id="flexCheckChecked">
        <label class="form-check-label" for="flexCheckChecked">Mostrar</label>
    </div>
    <button type="submit" class="btn btn-primary mb-5">Submit</button>
</form>

@endsection