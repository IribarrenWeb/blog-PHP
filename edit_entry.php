<?php 	
	require_once 'includes/redireccion.php';
	require_once 'includes/header.php';

	if ($_GET) :				
		$id_entry = isset($_GET['id']) ? $_GET['id'] : false;
		$_SESSION['entrada_id'] = $id_entry;
		$entrada = getEntradas(false,$id_entry);
?>

		<h1>Editar entrada</h1>
	<?php if (@isset($_SESSION['errores']['entrada'])): ?>
	        <div class="alert alert-danger">
	          <?= $_SESSION['errores']['entrada'] ?>
	        </div>
    <?php elseif (@isset($_SESSION['alerta']['entrada'])):?>
	    	<div class="alert alert-success">
	          <?= $_SESSION['alerta']['entrada'] ?>
	        </div>
    <?php endif; ?>
		<form class="form-group mt-5" action="acciones/entrada_update.php" method="POST" accept-charset="utf-8">

			<!-- TITULO -->
			<label for="titulo">Nombre de la entrada:</label>
			<input class="form-control" type="text" name="titulo" value="<?=$entrada['titulo']?>" required>
			<!-- ALERTA ERROR -->
			<?php if (@$_SESSION['errores']['titulo']): ?>
			  <p class="text-danger alert-error">*<?= $_SESSION['errores']['titulo'] ?></p>         
			<?php endif ?>

			<!-- CATEGORIA -->
			<label for="categoria" class="mt-3">Categoria</label>
			<input class="form-control" type="text" value="<?= ucwords($entrada['categoria'])?>" disabled>

			<!-- DESCRIPCION -->
			<label for="descripcion" class="mt-3">Descripcion:</label>
			<textarea class="form-control" name="descripcion"><?=$entrada['descripcion']?></textarea>
			<!-- ALERTA ERROR -->
			<?php if (@$_SESSION['errores']['descripcion']): ?>
				<p class="text-danger alert-error">*<?= $_SESSION['errores']['descripcion'] ?></p>         
			<?php endif ?>
			
			<button class="btn btn-block w-25 mx-auto mt-5 btn-success" type="submit">Guardar cambios</button>
		</form>

<?php 
		borrarErrores(); 
	else:
?>	
	<h1>Editar entrada</h1>
	<p>No se han recibido entradas para actualizar</p>
<?php
	endif;

	require_once 'includes/aside.php'; 
	require_once 'includes/footer.php';
?>
