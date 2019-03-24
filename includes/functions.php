<?php 
	
  require_once 'includes/conex.php'; 


	function borrarErrores(){
		$_SESSION['errores'] = null;
		$_SESSION['alerta'] = null;
	}

	function getCategorias(){
		global $conex;
		$sql = 'SELECT * FROM categorias';
		$result = mysqli_query($conex,$sql);
		return $result;
	}


	function getEntradas($limit = false,$id = false,$id_usu = false,$buscador = false){
		global $conex;
		if ($id_usu) {
			// SQL EN CASO DE QUE $id_usu SEA VERDADERO
			$sql = "SELECT e.*, c.nombre AS categoria FROM entradas e, categorias c WHERE e.usuario_id = $id_usu AND e.categoria_id = c.id ORDER BY e.id DESC";
		}elseif($id == false){
			// SQL POR DEFECTO EN CASO DE QUE TODOS LOS VALORES ESTEN EN FALSO
			$sql = 'SELECT e.*,c.nombre AS categoria FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id';

			if($buscador != false){
				// CONCATENACION DE SQL EN CASO DE QUE $buscador SEA VERDADERO
				$sql .=	" WHERE e.titulo LIKE '%$buscador%'";
			}

			// SE LE AGREGA AL FINAL EL ORDER BY EN CUALQUIERA DE LOS CASOS
			$sql .= ' ORDER BY e.id DESC';

			if ($limit) {
				// CONCATENACION DE SQL EN CASO DE QUE $limit SEA VERDADERO
				$sql .= ' LIMIT 4';
			}


		}else{
			// SQL EN CASO DE QUE $id SEA VERDADERO
			$sql = "SELECT e.*, u.nombre AS usuario, c.nombre AS categoria FROM entradas e, usuarios u, categorias c WHERE e.id = $id AND u.id = e.usuario_id AND c.id = e.categoria_id";
		}
	
		$query_result = mysqli_query($conex,$sql);
		
		$entradas = NULL;

		if (mysqli_num_rows($query_result)>=1) {
			$entradas = $query_result;

			if ($id) {
				// SE CREA UN ARRAY ASOCIATIVO DEL RESULTADO EN CASO DE QUE ID SEA VERDADERO
				$entradas = mysqli_fetch_array($entradas);
			}
		}

		return $entradas;
	}

	function getUser($id){
		global $conex;
		$sql = "SELECT * FROM usuarios WHERE id = $id";
		$query = mysqli_query($conex,$sql);
		$usuario = false;

		if ($query) {
			$usuario = mysqli_fetch_array($query);	
		}

		return $usuario;
	}

	function getEntryCategory($id){
		global $conex;
		$sql = "SELECT e.*, c.nombre AS categoria FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id AND c.id = $id GROUP BY e.id";
		$query = mysqli_query($conex,$sql);
		$entry_category = false;

		if ($query) {
			$entry_category = $query;
		}

		return $entry_category;
	}