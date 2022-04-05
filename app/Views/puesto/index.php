<?php echo $this->extend('plantilla.php'); ?>
<?php echo $this->section('contenido'); ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Puestos</h3>
        <div class="col-auto">
            <a href="<?php echo base_url('puestos/crear'); ?>" class="btn btn-primary btn-sm" title="Nuevo puesto">
                <i class="bi bi-plus-circle"></i>
                Nuevo
            </a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Sueldo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($puestos) and !is_null($puestos)) : ?>
                <?php foreach ($puestos as $k => $puesto) : ?>
                    <tr>
                        <td class="font-weight-bold"><?= $k + 1; ?></td>
                        <td><?= $puesto->pst_nombre; ?></td>
                        <td><?= $puesto->pst_sueldo; ?></td>
                        <td>
                            <a href="<?php echo base_url('puestos/editar/' . $puesto->id_puesto); ?>" class="btn btn-outline-primary btn-sm">Editar</a>
                            <a href="<?php echo base_url('puestos/eliminar/' . $puesto->id_puesto); ?>" class="btn btn-outline-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">
                        <p>La tabla no tiene registros.</p>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php echo $pager->links() ?>
</div>
</div>

<?php echo $this->endSection(); ?>