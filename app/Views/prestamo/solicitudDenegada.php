<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container alert alert-warning">
    ¡Lo sentimos! de momento usted no es sujeto de préstamo, en virtud de que:

</div>
<?= $this->endSection() ?>
<?php foreach (session('motivos') as $motivo) : ?>
    <li><?php echo $reason; ?></li>
<?php endforeach; ?>