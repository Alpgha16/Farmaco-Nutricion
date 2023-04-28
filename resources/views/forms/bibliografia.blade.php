@extends('template')

@section('content')

<div class="d-flex gap-2 justify-content-center py-3">
    <a href="/view_farmacos">
        <button class="btn btn-secondary rounded-pill px-3" type="button">Farmacos</button>
    </a>
    <a href="/view_grupos">
        <button class="btn btn-secondary rounded-pill px-3" type="button">Grupos</button>
    </a>
    <a href="/view_bibliografias">
        <button class="btn btn-primary rounded-pill px-3" type="button">Bibliografia</button>
    </a>
</div>

<form action="bibliografia" method="post" class="container mt-5">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="titulo" placeholder="example">
        <label for="floatingInput">Título</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="descripcion" placeholder="example">
        <label for="floatingInput">Descripcion</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="autor" placeholder="example">
        <label for="floatingInput">Autor</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="floatingInput" name="anio" placeholder="example">
        <label for="floatingInput">Año</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="editorial" placeholder="example">
        <label for="floatingInput">Editorial</label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" name="mostrar" id="flexCheckChecked">
        <label class="form-check-label" for="flexCheckChecked">Mostrar</label>
    </div>
    <button type="submit" class="btn btn-primary mb-5">Submit</button>
</form>

@endsection