<?php 

	if (isset($_POST)) {

		if (!isset($_SESSION)) {
			session_start();
		}

		require_once '../includes/conex.php';

		$titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($conex,$_POST['titulo']) : false;
		$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conex,$_POST['descripcion']) : false;
		$categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
		$usuario = isset($_POST['usuario']) ? (int)$_POST['usuario'] : false;

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
		// Validacion de categoria
		if (!empty($categoria) && is_int($categoria) && !preg_match('/[a-zA-Z]/',$categoria)) {
			$validacion_c = true;
		} else {
			$validacion_c = false;
			$errores['categoria'] = 'La categoria no puede estar vacia';
		}
		// Validacion de usuario
		if (!empty($usuario) && is_int($usuario) && !preg_match('/[a-zA-Z]/',$usuario)) {
			$validacion_u = true;
		} else {
			$validacion_u = false;
			$errores['usuario'] = 'el usuario no es valido';
		}

		if ($validacion_n && $validacion_d && $validacion_c && $validacion_u) {
			$sql = "INSERT INTO entradas (titulo,usuario_id,categoria_id,descripcion,fecha) VALUES('$titulo',$usuario,$categoria,'$descripcion',CURTIME())";
			if (mysqli_query($conex,$sql)) {
				$_SESSION['alerta']['entrada'] = 'Se ha creado con exito la entrada';
			}else{
				$_SESSION['errores']['entrada'] = 'Algo ha fallado al crear la entrada';
			}
		}else{
			$_SESSION['errores'] = $errores;
		}
	}

	header('location:../new_entry.php');