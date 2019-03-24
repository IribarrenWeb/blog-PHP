<?php 

	if(isset($_POST)) {

		if (!isset($_SESSION)) {
			session_start();
		}

		require_once '../includes/conex.php';
		
		// Recibir los datos enviados por POST
		var_dump($_POST);
		echo '<br><br>';
		$nombre = isset($_POST['nombre']) ? ucwords(strtolower($_POST['nombre'])) : false; 
		$apellido = isset($_POST['apellido']) ? ucwords(strtolower($_POST['apellido'])) : false;
		$email = isset($_POST['email']) ? strtoupper(trim($_POST['email'])) : false;
		$password = isset($_POST['password']) ? $_POST['password'] : false;

		$errores = array();

		// Validacion de nombre
		if (!preg_match('/[0-9]/', $nombre) && !is_int($nombre) && !empty($nombre)) {
			$validacion_n = true;
			echo 'El nombre es valido';
		} else {
			$validacion_n = false;
			$errores['nombre'] = 'El nombre no es valido';
		}

		// Validacion de apellido
		if (!preg_match('/[0-9]/', $apellido) && !is_int($apellido) && !empty($apellido)) {
			$validacion_a = true;
			echo 'El apellido es valido';
		} else {
			$validacion_a = false;
			$errores['apellido'] = 'El apellido no es valido';
		}
		
		// Validacion de email
		if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
			$validacion_e = true;
			echo 'El email es valido';
		} else {
			$validacion_e = false;
			$errores['email'] = 'El email no es valido';
		}

		// Validacion de password
		if (!empty($password)) {
			$validacion_p = true;
			echo 'El password es valido';
		} else {
			$validacion_p = false;
			$errores['password'] = 'El password no es valido';
		}

		if ($validacion_a && $validacion_e && $validacion_n && $validacion_p) {
				
			// Codificar la password
			$pass_hashed = password_hash($password,PASSWORD_BCRYPT, ['cost'=>4]);

			// Ingresar en la base de datos
			$sql = "INSERT INTO usuarios VALUES('null','$nombre','$apellido','$email','$pass_hashed', CURDATE())"; 
			$succ = mysqli_query($conex,$sql);


			if($succ){
				$_SESSION['alerta']['registro'] = 'Se ha registrado con exito';
			}else{
				$_SESSION['errores']['registro'] = 'No se ha podido registrar';
			}
		}else{
			$_SESSION['errores'] = $errores;
		}
	}

	header('location:../index.php#registro');
	