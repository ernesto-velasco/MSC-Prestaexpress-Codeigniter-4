<?php

namespace App\Controllers;

// importamos los modelos que vamos a consultar
use App\Models\EmpleadoModel;

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
}
