<?php template_set('title', 'Listado de articulo') ?>
<div class="container-fluid ">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <table class="table table-bordered table-hover table-condensed ">
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th colspan="2">Acciones</th>
                <?php foreach ($filas as $fila) { ?>
                    <tr>
                        <td><?= $fila['id'] ?></td>
                        <td><?= $fila['codigo'] ?></td>
                        <td><?= $fila['nombre'] ?></td>
                        <td><?= anchor('/articulos/borrar/' . $fila['id'], "Borrar", 'class="btn btn-danger btn-xs" role="button" ') ?></td>
                        <td><?= anchor('/articulos/editar/' . $fila['id'], "Editar", 'class="btn btn-warning btn-xs" role="button" ') ?></td>
                    </tr>
                <?php } ?>
            </table>
            <?= anchor('articulos/insertar', "Insertar", 'class="btn btn-success" role="button" ') ?>
        </div>
    </div>
</div>