@extends('template')

@section('content')


    <table class="table table-bordered container mt-3" id="farmacos">
    <p class="text-center mt-3 text-uppercase fs-1">Bibliografias</p>
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Autor</th>
                <th scope="col">Año</th>
                <th scope="col">Editorial</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = 'SELECT * FROM bibliografias WHERE estatus = 1';
            $conn = mysqli_connect('127.0.0.1', 'root', 'Pdnejoh1029$', 'laravel');
            $query = mysqli_query($conn, $sql);
            $num = 1;
            while($mostrar = mysqli_fetch_array($query)){
                $id = $mostrar['id'];
            ?>
            <tr>
                <th scope="row"><?php echo $num;
                    $num = $num + 1 ?></th>
                <td><?php echo $mostrar['titulo'] ?></td>
                <td><?php echo $mostrar['descripcion'] ?></td>
                <td><?php echo $mostrar['autor'] ?></td>
                <td><?php echo $mostrar['anio'] ?></td>
                <td><?php echo $mostrar['editorial'] ?></td>
                <td>
                    <a href="/bibliografia/editar/<?php echo $id ?>">
                        <button type="button" class="btn btn-warning">Editar</button>
                    </a>
                    <a href="/eliminar_bibliografia/<?php echo $id ?>">
                        <button type="button" class="btn btn-danger">Borrar</button>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

@endsection