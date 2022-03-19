<?php

namespace App\Controllers;

// importamos los modelos que vamos a consultar
use App\Models\EmpleadoModel;
use App\Models\PuestoModel;
use App\Models\DetEmpPuestoModel;

class EmpleadoController extends BaseController
{
    // vista de indice (tabla) de empleados
    public function index()
    {
        // conseguir todos los empleados vigentes de la bd
        // - creamos una instancia de la tabla de empleados
        $empleadoModel = new EmpleadoModel();

        // Recuperamos los empleados vigentes a traves del modelo
        // Como en el modelo establecimos 'fecha_egreso' como $deletedField
        // CodeIgniter sabe automaticamente que aquellos usuarios con una fecha de egreso registrada
        // son los que no estan vigentes
        // ** Armamos la consulta 
        $data['empleados'] = $empleadoModel->paginate(2);
        // si usamos la libreria paginate, debemos generar los links
        $data['pager'] = $empleadoModel->pager;
        // enviamos esta informacion a la vista
        // debemos crear una carpeta llama empleado dentro de app/Views
        // y dentro un archivo php llamado index.php
        return view('empleado/index', $data);
    }

    // vista de formulario para crear un nuevo empleado
    public function crear()
    {
        $puestosModel = new PuestoModel(); // instancia de modelo puestos
        $data['puestos'] = $puestosModel->findAll(); // obtenemos los puestos disponibles para mostrarlos en el formulario
        return view('empleado/crear', $data); // retornamos la vista y junto con la variable data
    }

    // registrar un nuevo empleado
    public function registrar()
    {
        // instancia de los modelos que usaremos
        $empleadoModel = new EmpleadoModel(); // modelo empleado para registrar el nuevo empleado
        $detEmpPuestoModel = new DetEmpPuestoModel(); // modelo DetEmpPuesto para registrar el puesto seleccionado por el usuario (que estamos recibiendo por post desde el formulario) del nuevo empleado en la tabla detalle

        // creamos un array de los datos recibidos desde el formulario
        // con el formato 'nombreCampoBD' => $this->request->getPost('nombreDelCampoEnElFormulario')
        $data = [
            'emp_nombre' => $this->request->getPost('emp_nombre'),
            'usuario' => $this->request->getPost('usuario'),
            'estado'  => $this->request->getPost('estado'),
            'contrasena' => $this->request->getPost('contrasena')
        ];

        $empleado = $empleadoModel->insert($data); // insertamos el nuevo registro en la bd

        // una vez creado el nuevo empleado insertamos el puesto en la tabla detalle
        $detEmpPuestoModel->insert([
            'id_empleado' => $empleado,
            'id_puesto' => $this->request->getPost('puesto')
        ]);

        session()->setFlashdata('success', 'El usuario fue registrado.'); // creamos un mensaje temporal para que el usuario sepa que no ocurrió ningún error

        return redirect()->to(base_url('empleados')); // retornamos a la url principal de empleados
    }
}
