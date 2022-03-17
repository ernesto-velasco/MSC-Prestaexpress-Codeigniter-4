<?php

namespace App\Controllers;

// importar el modelo de Empleado
use App\Models\EmpleadoModel;

class AuthController extends BaseController
{
    public function login()
    {
        // Obtener datos del formulario
        $usuario = $this->request->getPost('usuario');
        $contrasena = $this->request->getPost('contrasena');

        // Crear una instancia de la clase modelo Empleado
        $empleadoModel = new EmpleadoModel();

        // Buscar empleado por usuario en la bd
        $empleado = $empleadoModel->where('usuario', $usuario)->first();

        // Crear una instancia de session
        $session = session();

        // Retornar mensaje de error si el usuario no existe
        if (is_null($empleado)) :
            $session->setFlashdata('error', 'No existe un usuario con ese nombre, intenta de nuevo.');
            return redirect()->to(base_url('/'));
        endif;

        // Retornar mensaje de error si la contraseña es incorrecta
        if ($empleado->contrasena == $contrasena) :
            $session->setFlashdata('error', 'La contraseña es incorrecta, intenta de nuevo.');
            return redirect()->to(base_url('/'));
        endif;

        // Si el usuario y la contraseña son correcos
        // se crea una sesión con la info del usuario
        $session->empleado = $empleado;

        // redirigimos a la vista de administración
        return redirect()->to(base_url('/admin'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
