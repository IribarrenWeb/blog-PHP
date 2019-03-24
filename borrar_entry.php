<?php 

	if (isset($_GET)) {

		if (!isset($_SESSION)) {
			session_start();
		}

		require_once 'includes/conex.php';

		$entrada_id = isset($_GET['id']) ? $_GET['id'] : false;
		$user_id = $_SESSION['usuario']['id'];


		if ($entrada_id != false) {
			$sql = "DELETE FROM entradas WHERE id = $entrada_id AND usuario_id = $user_id";
			if (mysqli_query($conex,$sql)) {
				$_SESSION['alerta']['eliminacion_entry'] = 'Se ha eliminado la entrada con exito!.';
				header("location:my_entrys.php");
				echo 'holaaa';
			}else{
				$_SESSION['errores']['entrada'] = 'Algo ha fallado al Eliminar la entrada la entrada';
				goto error;
			}
		}else{
			$_SESSION['errores'] = 'No se ha podido borrar la entrada';
			error:
			header("location:entrada.php?id=$entrada_id");
		}
		
	}else{
		header("location:index.php");
	}
?>

