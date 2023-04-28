@extends('template')

@section('content')

<div class="d-flex gap-2 justify-content-center py-3">
    <a href="/view_farmacos">
        <button class="btn btn-primary rounded-pill px-3" type="button">Farmacos</button>
    </a>
    <a href="/view_grupos">
        <button class="btn btn-secondary rounded-pill px-3" type="button">Grupos</button>
    </a>
    <a href="/view_bibliografias">
        <button class="btn btn-secondary rounded-pill px-3" type="button">Bibliografia</button>
    </a>
</div>

<form action="farmacos" class="container mt-5" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="nombre" placeholder="example">
        <label for="floatingInput">Nombre Fármaco</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="mecanismo" placeholder="example">
        <label for="floatingInput">Mecanismo</label>
    </div>
    <div class="mb-3">
        <label for="imagen_url" class="form-label">Imagen Farmaco</label>
        <input class="form-control" type="file" name="imagen_url">
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="efecto" placeholder="example">
        <label for="floatingInput">Efecto</label>
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" id="floatingSelect" name="grupo" aria-label="Floating label select example">
            <option selected>Seleccionar Grupo</option>
            <?php
                $sql = 'SELECT * FROM grupos';
                $query = mysqli_query($conn, $sql);
                while($mostrar = mysqli_fetch_array($query)){
            ?>
            <option value="<?php echo $mostrar['id'] ?>"><?php echo $mostrar['grupo'] ?></option>
            <?php } ?>
        </select>
        <label for="floatingSelect">Grupo</label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" name="mostrar" id="flexCheckChecked">
        <label class="form-check-label" for="flexCheckChecked">Mostrar</label>
    </div>
    <button type="submit" class="btn btn-primary mb-5">Submit</button>
</form>

@endsection
