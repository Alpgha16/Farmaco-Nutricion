@extends('template')

@section('content')


    <table class="table table-bordered container mt-3" id="farmacos">
    <p class="text-center mt-3 text-uppercase fs-1">Grupos</p>
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Grupo</th>
                <th scope="col">Subgrupo</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = 'SELECT * FROM grupos';
            $query = mysqli_query($conn, $sql);
            $num = 1;
            while($mostrar = mysqli_fetch_array($query)){
                $id = $mostrar['id'];
            ?>
            <tr>
                <th scope="row"><?php echo $num;
                    $num = $num + 1 ?></th>
                <td><?php echo $mostrar['grupo'] ?></td>
                <td><?php echo $mostrar['subgrupo'] ?></td>
                <td>
                    <a href="/grupo/editar/<?php echo $id ?>">
                        <button type="button" class="btn btn-warning">Editar</button>
                    </a>
                    <a href="/eliminar_grupo/<?php echo $id ?>">
                        <button type="button" class="btn btn-danger">Borrar</button>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

@endsection
