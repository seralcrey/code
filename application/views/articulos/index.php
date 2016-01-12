<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Artículos</title>
    </head>
    <body>
        <table>
            <td>ID</td>
            <td>Código</td>
            <td>Nombre</td>
            <?php foreach ($filas as $fila) { ?>
                <tr>
                    <td><?= $fila['id'] ?></td>
                    <td><?= $fila['codigo'] ?></td>
                    <td><?= $fila['nombre'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>
