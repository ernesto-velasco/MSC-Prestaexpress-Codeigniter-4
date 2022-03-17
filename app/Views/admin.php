<!DOCTYPE html>
<html lang="es-Mx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRESTAEXPRESS</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <header class="container py-5 ">
        <div class="row justify-content-between align-items-center">
            <h1>Administración</h1>
            <div class="col-auto">
                <a href="<?php echo base_url('auth/logout'); ?>" title="Cerrar sesión" class="btn btn-outline-dark btn-sm">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Cerrar sesión
                </a>
            </div>
        </div>
        <div class="row text-muted">
            Bienvendo <?= session('empleado')->emp_nombre; ?>
        </div>
    </header>
    <main>
        <div class="container pb-5">
            <a href="<?php echo base_url("/prestamos/solicitud"); ?>" class="btn btn-outline-primary col-12 col-md-2">Solicitar</a>
            <a href="<?php echo base_url("/prestamos"); ?>" class="btn btn-outline-primary col-12 col-md-2">Préstamos</a>
            <a href="" class="btn btn-outline-primary col-12 col-md-2">Reportes</a>
            <a href="<?php echo base_url("/empleados"); ?>" class="btn btn-outline-primary col-12 col-md-2">Empleados</a>
        </div>
    </main>
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>