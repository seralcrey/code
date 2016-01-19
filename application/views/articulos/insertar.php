<div class="container-fluid ">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?= validation_errors() ?>
            <?= form_open('articulos/insertar') ?>
                <?= form_label('Codigo:', 'codigo') ?>
                <?= form_input('codigo', set_value('codigo', '', FALSE), 'id=""codigo') ?><br>
                <?= form_label('Nombre:', 'nombre') ?>
                <?= form_input('nombre', set_value('nombre', '', FALSE), 'id="nombre"') ?><br>
                <?= form_label('Precio:', 'precio') ?>
                <?= form_input('precio', set_value('precio', '', FALSE), 'id="precio"') ?><br>
                <?= form_label('Existencias:', 'existencias') ?>
                <?= form_input('existencias', set_value('existencias', '', FALSE), 'id="existencias"') ?><br>
                <?= form_submit('insertar', 'Insertar') ?>
                <?= anchor('articulos/index', form_button('cancelar', "Cancelar")) ?>
            <?= form_close() ?>

        </div>
    </div>
</div>

