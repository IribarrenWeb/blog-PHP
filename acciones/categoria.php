<?php 

	if (isset($_POST)) {

		if (!isset($_SESSION)) {
			session_start();
		}

		require_once '../includes/conex.php';

		$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conex,ucwords(strtolower($_POST['nombre'])) : false;

		// Validacion de nombre
		if (!preg_match('/[0-9]/', $nombre) && !is_int($nombre) && !empty($nombre)) {
			$validacion_n = true;
		} else {
			$validacion_n = false;
			$errores['nombre'] = 'El nombre no es valido';
		}

		if ($validacion_n) {
			$sql = "INSERT INTO categorias (nombre) VALUES('$nombre')";
			if (mysqli_query($conex,$sql)) {
				$_SESSION['alerta']['categoria'] = 'Se ha creado con exito';
			}else{
				$_SESSION['errores']['categoria'] = 'Algo ha fallado al guardar';
			}
		}
	}

	header('location:../new_category.php');