<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpleadoModel extends Model
{
    // * configuración del modelo
    // la tabla principal sobre la que trabaja el modelo
    protected $table = 'empleado';

    // columna que identifica de manera unica a un registro en la tabla (usado p.e. para buscar registros)
    protected $primaryKey = 'id_empleado';

    // indica si la tabla usa la opción auto-incrementable, si es false entonces se debe especificar el valor manualmente
    protected $useAutoIncrement = true;

    // tipo de respeusta por defecto (object, array)
    protected $returnType = 'object';

    // eliminado lógico: si es true, método delete() no eliminara permanentemente el registro de la bd
    // en su lugar establecera la fecha actual en la columna $deletedField, al buscar un registro unicamente
    // mostrara los registros con $deletedField nulo, salvo que especifiquemos lo contrario
    protected $useSoftDeletes = true;

    // indica si la fecha actual sera añadida automaticamente en los 'inserts' y 'updates',
    // si es true, requiere que la tabla contenga columnas 'created_at', 'updated_at'
    protected $useTimestamps = true;

    // especifica el campo  que guarda la fecha en que se inserta un registro a la bd
    protected $createdField = 'fecha_ingreso';

    // especifica el campo  que guarda la fecha en que se actualiza un registro a la bd
    // como la bd no tiene un campo para guardar ese dato lo dejamos en false
    protected $updatedField = false;

    // especifica el campo  que guarda la fecha en que se actualiza un registro a la bd
    protected $deletedField = 'fecha_egreso';

    // son los campor que se pueden modificar desde los formularios,
    // si no se encuentra en esta lista un campo que se quiere modificar 
    // el modelo lanza un error, sirve para mantener la seguridad de los datos
    protected $allowedFields    =
    [
        'emp_nombre',
        'estado',
        'usuario',
        'contrasena'
    ];
}
