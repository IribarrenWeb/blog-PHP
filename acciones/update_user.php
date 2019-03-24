<?php 

	if(isset($_POST)) {

		if (!isset($_SESSION)) {
			session_start();
		}

		require_once '../includes/conex.php';
		
		// Recibir los datos enviados por POST
		$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conex,ucwords(strtolower($_POST['nombre']))) : false; 
		$apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conex,ucwords(strtolower($_POST['apellido']))) : false;
		$email = isset($_POST['email']) ? strtolower(trim($_POST['email'])) : false;
		$usuario = $_SESSION['usuario']['id'];
		$usuario_email = strtolower($_SESSION['usuario']['email']);


		$errores = array();

		// Validacion de nombre
		if (!preg_match('/[0-9]/', $nombre) && !is_int($nombre) && !empty($nombre)) {
			$validacion_n = true;
		//	echo 'El nombre es valido';
		} else {
			$validacion_n = false;
			$errores['nombre'] = 'El nombre no es valido';
		}

		// Validacion de apellido
		if (!preg_match('/[0-9]/', $apellido) && !is_int($apellido) && !empty($apellido)) {
			$validacion_a = true;
		//	echo 'El apellido es valido';
		} else {
			$validacion_a = false;
			$errores['apellido'] = 'El apellido no es valido';
		}
		
		// Validacion de email
		if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
			if ($email != $usuario_email) {
				$sql = "SELECT email FROM usuarios WHERE email = '$email'";
				$query = mysqli_query($conex,$sql);

				if (mysqli_num_rows($query) != 1) {
					$validacion_e = true;	
					echo 'El email es valido';
				}else{
					goto false;
				}
			}else{

				$validacion_e = true;
			}
			
		} else {
			false:
			$validacion_e = false;
			$errores['email'] = 'El email no es valido o ya existe.';
		}

		if ($validacion_a && $validacion_e && $validacion_n) {

			// Actualizar en la base de datos
			$sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', email = '$email' WHERE id = $usuario"; 
			$succ = mysqli_query($conex,$sql);

			if($succ){
				$_SESSION['usuario']['nombre'] = $nombre;
				$_SESSION['usuario']['apellido'] = $apellido;
				$_SESSION['usuario']['email'] = $email;
				$_SESSION['alerta']['actualizar'] = 'Se han actualizado los datos con exito';
			}else{
				$_SESSION['errores']['actualizar'] = 'No se ha podido actualizar';
			}
		}else{
			$_SESSION['errores'] = $errores;
		}
	}

	header('location:../mis_datos.php');