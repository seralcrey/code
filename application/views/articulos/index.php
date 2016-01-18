<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Artículos</title>
    </head>
    <body>
        <table style="border: 2px solid black;">
            <th>ID</th>
            <th>Código</th>
            <th>Nombre</th>
            <th colspan="2">Acciones</th>
            <?php foreach ($filas as $fila) { ?>
                <tr>
                    <td><?= $fila['id'] ?></td>
                    <td><?= $fila['codigo'] ?></td>
                    <td><?= $fila['nombre'] ?></td>
                    <td><?= anchor('/articulos/borrar/'. $fila['id'], form_button('borrar', "Borrar") )?></td>
                    <td><?= anchor('/articulos/editar/'. $fila['id'], form_button('editar', "Editar") )?></td>
                </tr>
            <?php } ?>
        </table>
        <?= anchor('articulos/insertar', form_button('insertar', "Insertar")) ?>
    </body>
</html>
