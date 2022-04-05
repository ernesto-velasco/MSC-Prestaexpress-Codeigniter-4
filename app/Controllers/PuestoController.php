<?php

namespace App\Controllers;

use App\Models\PuestoModel; // importamos los modelos que vamos a consultar

class PuestoController extends BaseController
{
    public function index() // vista de indice (tabla) de empleados
    {
        $puestoModel = new PuestoModel(); // nueva instancia modelo puesto

        $data['puestos'] = $puestoModel->paginate(15); // Conseguir todos los puesto de la bd

        $data['pager'] = $puestoModel->pager; // si usamos la librería paginate, debemos generar los links

        return view('puesto/index', $data); // enviamos esta información a la vista
    }

    public function crear() // vista de formulario para crear un nuevo empleado
    {
        return view('puesto/crear'); // retornamos la vista con el form para registrar un nuevo puesto
    }

    public function registrar() // registrar un nuevo empleado
    {
        $puestoModel = new PuestoModel(); // instancia del modelo, para insertar los datos a la bd

        $data = [ // creamos un array de los datos recibidos desde el formulario
            'pst_nombre' => $this->request->getPost('pst_nombre'),
            'pst_sueldo' => $this->request->getPost('pst_sueldo')
        ]; // formato 'nombreCampoBD' => $this->request->getPost('nombreDelCampoEnElFormulario')

        $puestoModel->insert($data); // insertamos el nuevo registro en la bd

        session()->setFlashdata('success', 'El puesto fue registrado.'); // mensaje temporal para que el usuario sepa que no ocurrió ningún error

        return redirect()->to(base_url('puestos')); // retornamos a la url principal de empleados
    }

    public function editar($id) // vista de formulario para editar un empleado
    {
        $puestoModel = new PuestoModel(); // instancia del modelo para buscar al puesto por $id que recibimos como parámetro por la url

        $data['puesto'] = $puestoModel->find($id); // información del empleado a modificar

        return view('puesto/editar', $data);
    }

    public function actualizar($id) // actualizar los datos de un registro
    {
        $puestoModel = new PuestoModel(); // modelo para actualizar empleado

        $data = [
            'pst_nombre' => $this->request->getPost('pst_nombre'),
            'pst_sueldo' => $this->request->getPost('pst_sueldo')
        ]; // información recibida del formulario

        $puestoModel->update($id, $data); // actualizamos el empleado con la info del formulario

        session()->setFlashdata('success', 'El puesto fue actualizado.');

        return redirect()->back();
    }

    public function eliminar($id) // eliminar un registro por id
    {
        $puestoModel = new PuestoModel(); // modelo empleado para eliminarlo de la bd

        $puestoModel->delete($id); // eliminamos al empleado con su id

        session()->setFlashdata('success', 'El puesto fue eliminado.'); // mandamos un mensaje de éxito a la vista

        return redirect()->to(base_url('/puestos')); // redirigimos a la vista principal de empleados
    }
}
