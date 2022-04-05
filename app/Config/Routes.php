<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index'); // retorna la vista de login

// lógica para iniciar una sesión
$routes->post('/auth/login', 'AuthController::login'); // aquí se procesa el formulario de login para buscar si el usuario y contraseña existen

// lógica para cerrar sesión
$routes->get('/auth/logout', 'AuthController::logout'); // eliminar la sesión del usuario

// vista de administración
$routes->get('/admin', 'Home::admin');

// CRUD empleados
$routes->add('/empleados', 'EmpleadoController::index');
$routes->get('/empleados/crear', 'EmpleadoController::crear');
$routes->post('/empleados/registrar', 'EmpleadoController::registrar');
$routes->get('/empleados/editar/(:num)', 'EmpleadoController::editar/$1');
$routes->post('/empleados/actualizar/(:num)', 'EmpleadoController::actualizar/$1');
$routes->get('/empleados/eliminar/(:num)', 'EmpleadoController::eliminar/$1');

// CRUD puestos
$routes->add('/puestos', 'PuestoController::index');
$routes->get('/puestos/crear', 'PuestoController::crear');
$routes->post('/puestos/registrar', 'PuestoController::registrar');
$routes->get('/puestos/editar/(:num)', 'PuestoController::editar/$1');
$routes->post('/puestos/actualizar/(:num)', 'PuestoController::actualizar/$1');
$routes->get('/puestos/eliminar/(:num)', 'PuestoController::eliminar/$1');

// CRUD prestamos
$routes->get('/prestamos', 'PrestamoController::index');
$routes->get('/prestamos/solicitud', 'PrestamoController::solicitud', ['filter' => 'validarSolicitudPrestamo']);
$routes->post('/prestamos/registrar', 'PrestamoController::registrar');
$routes->get('/prestamos/aprobar/(:num)', 'PrestamoController::aprobar/$1');
$routes->get('/prestamos/eliminar/(:num)', 'PrestamoController::eliminar/$1');
$routes->get('/prestamos/detalles/(:num)', 'PrestamoController::detalles/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
