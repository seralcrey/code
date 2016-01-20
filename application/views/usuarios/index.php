<?php template_set('title', 'Listado de usuarios') ?>
<div class="container-fluid ">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <table class="table table-bordered table-hover table-condensed ">
                <th>Numero</th>
                <th>Nick</th>
                <th>Rol</th>
                <th colspan="2">Acciones</th>
                <?php foreach ($filas as $fila) { ?>
                    <tr>
                        <td><?= $fila['numero'] ?></td>
                        <td><?= $fila['nick'] ?></td>
                        <td><?= $fila['rol_id'] ?></td>
                        <td><?= anchor('/usuarios/borrar/' . $fila['id'], "Borrar", 'class="btn btn-danger btn-xs" role="button" ') ?></td>
                        <td><?= anchor('/usuarios/editar/' . $fila['id'], "Editar", 'class="btn btn-warning btn-xs" role="button" ') ?></td>
                    </tr>
                <?php } ?>
            </table>
            <?= anchor('/usuarios/insertar', "Insertar", 'class="btn btn-success" role="button" ') ?>
        </div>
    </div>
</div>