<?php defined('BASEPATH') OR exit('No direct script access allowed');

class FunctionsLibrary extends CI_Model {

	public static function setNullValues($datos=array()) {
		if(empty($datos)) return $datos;

		foreach ($datos as $key => $value) {
			if ($value=="") {
				$datos[$key] = NULL;
			}
		}

		return $datos;
	}

	public static function fechaMysqlToReal($fecha){
		$fecha = trim($fecha);
		if (!$fecha) return '';
		if ($fecha=='0000-00-00') return '';
		// if (!Util::validateDate($fecha, 'Y-m-d')) return '';
		$date = new DateTime($fecha);
		return $date->format('d/m/Y');
	}

	public static function fechaRealToMysql($fecha){
		$fecha = trim(@$fecha);
		if (empty($fecha)) return '';
		if ($fecha=='00/00/0000' || ($fecha=='0000-00-00')) return '';
		$fechaAux = explode('/', $fecha);
		$fecha = $fechaAux[2].'-'.$fechaAux[1].'-'.$fechaAux[0];
		return $fecha;
	}

	public static function fechaActualMysql(){
	    return date('Y-m-d');
	}
}
