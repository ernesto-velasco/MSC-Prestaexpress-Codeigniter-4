<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class IsLoggedIn implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si no hay una sesión activa
        if (!session('empleado')) :
            session()->setFlashdata('error', 'Debes iniciar sesión para acceder a esta página');
            return redirect()->to(base_url('/'));
        endif;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
