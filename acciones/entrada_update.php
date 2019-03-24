<?php 

	if (isset($_POST)) {

		if (!isset($_SESSION)) {
			session_start();
		}

		require_once '../includes/conex.php';

		$titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($conex,$_POST['titulo']) : false;
		$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conex,$_POST['descripcion']) : false;
		$categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
		$entrada_id = $_SESSION['entrada_id'];

		// Validacion de titulo
		if (!empty($titulo)) {
			$validacion_n = true;
		} else {
			$validacion_n = false;
			$errores['titulo'] = 'El titulo no es valido';
		}
		// Validacion de descripcion
		if (!empty($descripcion)) {
			$validacion_d = true;
		} else {
			$validacion_d = false;
			$errores['descripcion'] = 'La descripcion no puede estar vacia';
		}

		if ($validacion_n && $validacion_d) {
			$sql = "UPDATE entradas SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = $entrada_id";
			if (mysqli_query($conex,$sql)) {
				$_SESSION['alerta']['entrada'] = 'Se ha actualizado con exito la entrada';
			}else{
				$_SESSION['errores']['entrada'] = 'Algo ha fallado al actualizar la entrada';
			}
		}else{
			$_SESSION['errores'] = $errores;
		}
	}

	header("location:../edit_entry.php?id=$entrada_id");