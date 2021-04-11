<?php
// Dentro de cada apartado ponerlos por orden alfabético

ini_set('display_errors',1);
ini_set('error_reporting', E_ALL ^E_NOTICE ^E_WARNING);

require_once 'D:/www/html/gesintranet/includes/constantes.php';
require_once 'D:/www/html/gesintranet/includes/constantes_seguridad.php';
require_once 'D:/www/html/gesintranet/includes/funciones.php';

spl_autoload_register(function ($nombre_clase) {
	// REGISTRAR LLAMADAS A LA CLASE VEHICULO POR SOBRECARGA DE MYSQL
	// if ($nombre_clase == 'Vehiculo') {

	// 	$page = new Page($_POST, $_GET, $_SERVER, $_SESSION);
	// 	$empleado = $page->getUsuarioValidado();

	// 	RegistroLog::registrar("Llamada a la clase Vehiculo desde " . $_SERVER["REQUEST_URI"], $empleado->getNombreCorto(), $empleado->getLogin());
		
	// }

    if (file_exists('D:/www/html/gesintranet/modelos/'.$nombre_clase . '.php')) {
        require_once 'D:/www/html/gesintranet/modelos/'.$nombre_clase . '.php';
    } elseif ($nombre_clase == 'PHPPaging') {
        require_once 'D:/www/html/gesintranet/includes/PHPPaging.lib.php';
    }
});

if (!isset($_SESSION)) {
    session_start();
}

require_once 'D:/www/html/gesintranet/includes/seguridad.php';