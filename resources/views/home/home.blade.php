@extends('template')

@section('content')


    <table class="table table-bordered container mt-3" id="farmacos">
    <p class="text-center mt-3 text-uppercase fs-1">Farmacos</p>
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imagen</th>
                <th scope="col">Farmaco</th>
                <th scope="col">Mecanismo</th>
                <th scope="col">Efecto</th>
                <th scope="col">Grupo</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = 'SELECT * FROM farmacos';
            $query = mysqli_query($conn, $sql);
            $num = 1;
            while($mostrar = mysqli_fetch_array($query)){ 
            ?>
            <tr>
                <th scope="row"><?php echo $num;
                    $num = $num + 1 ?></th>
                <td><img src="/storage/imgFarmacos/<?php echo $mostrar['imagen_url'] ?>" class="rounded mx-auto d-block" alt="Imagen Farmaco <?php echo $mostrar['farmaco'] ?>" height="40"></td>
                <td><?php echo $mostrar['farmaco'] ?></td>
                <td><?php echo $mostrar['mecanismo'] ?></td>
                <td><?php echo $mostrar['efecto'] ?></td>
                <?php
                    $id = $mostrar['id'];
                    $sql2 = "SELECT grupos.grupo AS grupo FROM farmacos LEFT JOIN grupos ON farmacos.id_grupo = grupos.id WHERE farmacos.id = {$id}";
                    $query2 = mysqli_query($conn, $sql2);
                    while($mostrar2 = mysqli_fetch_array($query2)){
                ?>
                    <td><?php echo $mostrar2['grupo'] ?></td>
                <?php } ?>
                    <td >
                        <a href="/farmaco/editar/<?php echo $id ?>">
                            <button type="button" class="btn btn-warning">Editar</button>
                        </a>
                        <a href="/interacciones/<?php echo $id ?>">
                            <button type="button" class="btn btn-success">Interacciones</button>
                        </a>
                        <a href="/relaciones/<?php echo $id ?>">
                            <button type="button" class="btn btn-primary">Bibliografias</button>
                        </a>
                        <a href="/eliminar_farmaco/<?php echo $id ?>">
                            <button type="button" class="btn btn-danger">Borrar</button>
                        </a>
                    </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

@endsection
