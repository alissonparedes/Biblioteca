<?php
/**
 * Front Controller
 * Punto de entrada único de la aplicación MVC.
 * Enruta las peticiones con base en los parámetros ?controller= y ?action=
 */

// Mapa de controladores disponibles: parámetro GET => [archivo, clase]
$controllersMap = [
    'categoria' => ['CategoriaController.php', 'CategoriaController'],
    'libro'     => ['LibroController.php', 'LibroController'],
    'prestamo'  => ['PrestamoController.php', 'PrestamoController'],
];

$controllerParam = $_GET['controller'] ?? 'categoria';
$action = $_GET['action'] ?? 'index';

if (!array_key_exists($controllerParam, $controllersMap)) {
    http_response_code(404);
    die('Controlador no encontrado.');
}

[$file, $className] = $controllersMap[$controllerParam];
require_once __DIR__ . '/../controllers/' . $file;

$controller = new $className();

if (!method_exists($controller, $action)) {
    http_response_code(404);
    die('Acción no encontrada.');
}

$controller->$action();
