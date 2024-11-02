<?php

require_once 'config/config.php';
require_once 'database/DB.php';
require_once "controllers/AuthController.php";
require_once "controllers/HomeController.php";
require_once "controllers/MateriasController.php";
require_once "routes/Router.php";

// Configurar el router

$router = new Router('/practicas');

$router->get('/', 'AuthController@index');
$router->get('/home', 'HomeController@index');

//rutas del controlador de materias
$router->get('/materias', 'MateriasController@index');
$router->get('/agregar-materia', 'MateriasController@create');
$router->post('/guardar-materia', 'MateriasController@insert');
$router->get('/editar-materia/{id}', 'MateriasController@edit');
$router->post('/actualizar-materia/{id}', 'MateriasController@update');
$router->post('/borrar-materia/{id}', 'MateriasController@delete');

$router->run();