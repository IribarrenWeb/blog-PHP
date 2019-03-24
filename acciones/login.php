<?php 


	if ($_POST) {
		
		// CONEXION A LA DB
		require_once '../includes/conex.php';

		if (!isset($_SESSION)) {
			session_start();
		}

		// DATOS RECIBIDOS POR POST
		$email = !empty($_POST['email']) ? trim($_POST['email']) : false;
		$password = !empty($_POST['password']) ? trim($_POST['password']) : false;

		// VERIFICACION DE DATOS VACIOS
		if ($email != false && $password != false) {
			
			// COMPROBAR SI EXISTE EL USUARIO
			$sql = "SELECT * FROM usuarios WHERE email = '$email'";
			$verify_user = mysqli_query($conex,$sql);

			if (mysqli_num_rows($verify_user) == 1) {
				$usuario = mysqli_fetch_assoc($verify_user);

				// VERIFICACION DE LAS CREDENCIALES
				if(password_verify($password,$usuario['password'])){
					// ASIGNACION DE LA SESION
					$_SESSION['usuario'] = $usuario;
					$_SESSION['clave'] = 778899;
				}else{
					$_SESSION['errores']['login'] = 'Credenciales no coinciden';
				}
			
			}else{
			// MENSAJE DE ERROR DE CREDENCIALES
				$_SESSION['errores']['login'] = 'Credenciales no coinciden';	
			}
		}else{
			// MENSAJE DE ERROR DE CREDENCIALES	
			$_SESSION['errores']['login'] = 'Credenciales vacias';
		}
	}

	header('location:../index.php');