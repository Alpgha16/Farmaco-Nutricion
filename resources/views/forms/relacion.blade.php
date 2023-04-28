@extends('template')

@section('content')

<?php
    $sql = "SELECT * FROM farmacos WHERE id = {$id}";
    $conn = mysqli_connect('127.0.0.1', 'root', 'Pdnejoh1029$', 'laravel');
    $query = mysqli_query($conn, $sql);
    $mostrar = mysqli_fetch_array($query)
?>

<form action="/relaciones" method="post" class="container mt-5">
    @csrf
    <div class="mb-3">
        <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $mostrar['id'] ?>" name="farmaco">
    </div>
    <fieldset disabled>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" value="<?php echo $mostrar['farmaco'] ?>">
            <label for="floatingSelect">Fármaco</label>
        </div>
    </fieldset>
    <div class="input-group mb-3">
        <select class="form-select" id="floatingSelect" name="bibliografia" aria-label="Floating label select example">
            <option selected>Seleccionar Bibliografia</option>
            <?php
                $sql = 'SELECT * FROM bibliografias WHERE estatus = 1';
                $conn = mysqli_connect('127.0.0.1', 'root', 'Pdnejoh1029$', 'laravel');
                $query = mysqli_query($conn, $sql);
                while($mostrar3 = mysqli_fetch_array($query)){
            ?>
            <option value="<?php echo $mostrar3['id'] ?>"><?php echo $mostrar3['titulo'] ?></option>
            <?php } ?>
        </select>
        <button class="btn btn-warning" type="button">
            <a href="/view_bibliografias" style="color:black; text-decoration: none;">Crear Nueva Bibliografia</a>
        </button>
    </div>
    <button type="submit" class="btn btn-primary mb-5" name="agregar">Submit</button>
</form>

<table class="table container">
    <p class="text-center mt-3 text-uppercase fs-3">Bibliografias de <?php echo $mostrar['farmaco'] ?></p>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Bibliografia</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
            <?php
            $sql2 = "SELECT relaciones.id as id_rel, bibliografias.titulo as titulo, bibliografias.id as biblio, farmacos.id as farmaco FROM farmacos LEFT JOIN relaciones ON farmacos.id = relaciones.id_farmaco LEFT JOIN bibliografias ON relaciones.id_bibliografia = bibliografias.id WHERE farmacos.id = {$id}";
            $conn2 = mysqli_connect('127.0.0.1', 'root', 'Pdnejoh1029$', 'laravel');
            $query2 = mysqli_query($conn2, $sql2);
            $num = 1;
            while($mostrar2 = mysqli_fetch_array($query2)){
            ?>
                <tr>
                    <th scope="row"><?php echo $num;
                    $num = $num + 1 ?></th>
                    <td><?php echo $mostrar2['titulo'] ?></td>
                    <td>
                        <a href="/eliminar_relacion/<?php echo $mostrar ['id'] ?>/<?php echo $mostrar2 ['id_rel'] ?>">
                            <button type="button" class="btn btn-danger">Borrar</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
    </tbody>
</table>

@endsection