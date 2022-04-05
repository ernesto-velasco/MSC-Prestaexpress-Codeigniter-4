<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

use App\Models\PrestamoModel;

class ValidarSolicitudPrestamo implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Comprobar años trabajados
        $fechaActual = new \DateTime(date('Y-m-d'));
        $fechaIngreso = new \DateTime(session('empleado')->fecha_ingreso);
        $aniosTrabajados = $fechaActual->diff($fechaIngreso)->y;
        $razones = [];
        // comprobar antigüedad
        if ($aniosTrabajados < 1) :
            array_push($razones, 'Tienes menos de un año de antigüedad');
        endif;
        // comprobar préstamo activo
        $prestamoModel = new PrestamoModel();
        $prestamoActivo = $prestamoModel
            ->where('id_empleado', session('empleado')->id_empleado)
            ->where('fecha_fin_desc is null')
            ->find();
        if ($prestamoActivo) :
            array_push($razones, 'Tiene un préstamo activo');
        endif;
        if ($razones) :
            session()->setFlashdata('razones', $razones);
        endif;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
