<?php template_set('title', 'Editar articulo') ?>
<div class="container-fluid " style="padding-top: 20px">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?= validation_errors() ?>
                    <?= form_open('usuarios/editar/' . $id) ?>
                    <div class="form-group">
                        <?= form_label('Codigo:', 'codigo') ?>
                        <?= form_input('codigo', set_value('codigo', $codigo, FALSE), 'id="codigo" class="form-control"') ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Nombre:', 'nombre') ?>
                        <?= form_input('nombre', set_value('nombre', $nombre, FALSE), 'id="nombre" class="form-control"') ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Precio:', 'precio') ?>
                        <?= form_input('precio', set_value('precio', $precio, FALSE), 'id="precio" class="form-control"') ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Existencias:', 'existencias') ?>
                        <?= form_input('existencias', set_value('existencias', $existencias, FALSE), 'id="existencias" class="form-control"') ?>
                    </div>

                    <?= form_submit('editar', 'Editar', 'class="btn btn-success"') ?>
                    <?= anchor('usuarios/index', 'Cancelar', 'class="btn btn-danger" role="button"') ?>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>