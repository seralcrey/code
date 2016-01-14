<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?= form_open('articulos/insertar') ?>
            <?= form_label('Codigo:', 'codigo') ?>
            <?= form_input('codigo', '', 'id=""codigo') ?><br>
            <?= form_label('Nombre:', 'nombre') ?>
            <?= form_input('nombre', '', 'id="nombre"') ?><br>
            <?= form_label('Precio:', 'precio') ?>
            <?= form_input('precio', '', 'id="precio"') ?><br>
            <?= form_label('Existencias:', 'existencias') ?>
            <?= form_input('existencias', '', 'id="existencias"') ?><br>
            <?= form_submit('insertar', 'Insertar')?>
        <?= form_close() ?>
    </body>
</html>


