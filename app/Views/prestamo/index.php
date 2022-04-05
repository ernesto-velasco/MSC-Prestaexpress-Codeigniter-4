<?php echo $this->extend('plantilla'); ?>
<?php echo $this->section('contenido'); ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Prestamos</h3>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Empleado</th>
                <th>Fecha solicitud</th>
                <th>Fecha inicio - fin</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($prestamos) and !is_null($prestamos)) : ?>
                <?php foreach ($prestamos as $prestamo) : ?>
                    <tr>
                        <td class="font-weight-bold"><?= $prestamo->id_prestamo; ?></td>
                        <td><?= $prestamo->emp_nombre; ?></td>
                        <td><?= $prestamo->fechasolicitud ?></td>
                        <td><?= $prestamo->fecha_ini_desc . ' - ' . $prestamo->fecha_fin_desc; ?></td>
                        <td><?= '$' . $prestamo->monto; ?></td>
                        <td><?= $prestamo->estado; ?></td>
                        <td class="d-flex gap-2 justify-content-end">
                            <?php if (session('empleado')->puesto->pst_nombre == "Administrador") : ?>
                                <?php if ($prestamo->estado == 'SOLICITUD') : ?>
                                    <a href="<?php echo base_url('prestamos/aprobar/' . $prestamo->id_prestamo); ?>" class="btn btn-outline-warning btn-sm">Aprobar</a>
                                <?php else : ?>
                                    <a href="" class="btn btn-outline-primary btn-sm">Abonar</a>
                                <?php endif; ?>
                                <a href="<?php echo base_url('prestamos/eliminar/' . $prestamo->id_prestamo); ?>" class="btn btn-outline-danger btn-sm">Eliminar</a>
                            <?php endif; ?>
                            <a href="<?php echo base_url('prestamos/detalles/' . $prestamo->id_prestamo); ?>" class="btn btn-outline-primary btn-sm">Detalles</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">
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