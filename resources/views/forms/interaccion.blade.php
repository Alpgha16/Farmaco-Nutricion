@extends('template')

@section('content')

<?php
    $sql = "SELECT * FROM farmacos WHERE id = {$id}";
    $query = mysqli_query($conn, $sql);
    $mostrar = mysqli_fetch_array($query)
?>

<form action="/interacciones" method="post" class="container mt-5">
    @csrf
    <div class="mb-3" style="visibility: hidden;">
        <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $mostrar['id'] ?>" name="farmaco">
    </div>
    <fieldset disabled>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" value="<?php echo $mostrar['farmaco'] ?>">
            <label for="floatingSelect">Fármaco</label>
        </div>
    </fieldset>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="recomendacion" placeholder="example">
        <label for="floatingInput">Interaccion</label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" name="mostrar" id="flexCheckChecked">
        <label class="form-check-label" for="flexCheckChecked">Mostrar</label>
    </div>
    <button type="submit" class="btn btn-primary mb-5" name="agregar">Submit</button>
</form>

<table class="table container">
    <p class="text-center mt-3 text-uppercase fs-3">Interacciones de <?php echo $mostrar['farmaco'] ?></p>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Interaccion</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
            <?php
            $sql2 = "SELECT * FROM interacciones WHERE id_farmaco = {$id}";
            $query2 = mysqli_query($conn, $sql2);
            $num = 1;
            while($mostrar2 = mysqli_fetch_array($query2)){
                $id_inter = $mostrar2['id'];
            ?>
                <tr>
                <th scope="row"><?php echo $num;
                    $num = $num + 1 ?></th>
                    <td><?php echo $mostrar2['recomendacion'] ?></td>
                    <td>
                        <a href="/interaccion/editar/<?php echo $mostrar['id'] ?>/<?php echo $mostrar2['id'] ?>">
                            <button type="button" class="btn btn-warning">Editar</button>
                        </a>
                        <a href="/eliminar_interaccion/<?php echo $mostrar ['id'] ?>/<?php echo $id_inter ?>">
                            <button type="button" class="btn btn-danger">Borrar</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
    </tbody>
</table>

@endsection
