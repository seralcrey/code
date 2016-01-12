<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Borrar Artículos</title>
    </head>
    <body>
        <h3>¿Seguro que desea borrar el artículo?</h3>
        <?= form_open('articulos/hacer_borrado') ?>
            <?= form_hidden('id',$id)?>
            <?= form_submit('borrar', 'Sí')?>
        <?= form_close()?>
    </body>
</html>
