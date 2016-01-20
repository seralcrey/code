<?php template_set('title', 'Borrar articulo') ?>

<h3>¿Seguro que desea borrar el siguiente artículo? </h3>
<p>(<?= $numero ?>) => <?= $nick ?></p>
<?= form_open('usuarios/borrar') ?>
    <?= form_hidden('id', $id) ?>
    <?= form_submit('borrar', 'Sí') ?>
    <?= anchor('usuarios/index', form_button('no', 'No')) ?>
<?= form_close() ?>
   
