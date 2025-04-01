<?php
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

ini_set('ignore_repeated_errors', TRUE); // always use TRUE

ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

ini_set('log_errors', TRUE); // Error/Exception file logging engine.

//ini_set("error_log", "/var/www/html/expense-app/php-error.log");
ini_set("error_log", "/Library/WebServer/Documents/expenses/php-error.log");
error_log( "Hello, errors!" );


require_once 'libs/database.php';
require_once 'libs/controller.php'; //se carga el controlador base
require_once 'libs/model.php'; //se carga el modelo base
require_once 'libs/view.php'; //se carga la vista base
require_once 'libs/app.php';
require_once 'config/config.php'; //se carga la configuracion de la base de datos


// Iniciar la aplicación
try {
    $app = new App();

} catch (Exception $e) {
    die('Error en la aplicación: ' . $e->getMessage());
}


//

?>