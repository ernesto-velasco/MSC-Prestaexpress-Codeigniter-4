<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class IsAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si no es administrador
        if (session('empleado')->puesto->pst_nombre != 'Administrador') {
            session()->setFlashdata('error', 'No tienes permisos para acceder a esta página');
            return redirect()->to(base_url('/admin'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
