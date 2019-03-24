<?php 	
	require_once 'includes/redireccion.php';

	require_once 'includes/header.php';
?>

	<h1>Crear entrada</h1>
	<p class="text-center mx-3 text-muted">Crea una nueva entrada para que los demas usuarios puedan disfrutar del contenido de nuestro blog.</p>
	<?php if (@isset($_SESSION['errores']['entrada'])): ?>
        <div class="alert alert-danger">
          <?= $_SESSION['errores']['entrada'] ?>
        </div>
    <?php elseif (@isset($_SESSION['alerta']['entrada'])):?>
    	<div class="alert alert-success">
          <?= $_SESSION['alerta']['entrada'] ?>
        </div>
    <?php endif; ?>
	<form class="form-group mt-5" action="acciones/entrada.php" method="POST" accept-charset="utf-8">
		<label for="titulo">Nombre de la entrada:</label>
		<input class="form-control" type="text" name="titulo" required>
		<!-- ALERTA ERROR -->
		<?php if (@$_SESSION['errores']['titulo']): ?>
		  <p class="text-danger alert-error">*<?= $_SESSION['errores']['titulo'] ?></p>         
		<?php endif ?>

		<label for="categoria" class="mt-3">Categoria:</label>
		<select class="custom-select" name="categoria">
			<?php
				$categorias = getCategorias();
				while ($categoria = mysqli_fetch_array($categorias)): 
			?>
					<option value="<?= $categoria[0] ?>"><?= ucwords(strtolower($categoria[1])) ?></option>
			<?php 
				endwhile; 
			?>
		</select>
		<!-- ALERTA ERROR -->
		<?php if (@$_SESSION['errores']['categoria']): ?>
		  <p class="text-danger alert-error">*<?= $_SESSION['errores']['categoria'] ?></p>         
		<?php endif ?>

		<label for="descripcion" class="mt-3">Descripcion:</label>
		<textarea class="form-control" name="descripcion"></textarea>
		<!-- ALERTA ERROR -->
		<?php if (@$_SESSION['errores']['descripcion']): ?>
			<p class="text-danger alert-error">*<?= $_SESSION['errores']['descripcion'] ?></p>         
		<?php endif ?>

		<input type="hidden" name="usuario" value="<?= $_SESSION['usuario']['id'] ?>">
		<button class="btn btn-block w-25 mx-auto mt-5 btn-success" type="submit">Guardar</button>
	</form>

<?php 
	
	borrarErrores(); 
	require_once 'includes/aside.php'; 
	require_once 'includes/footer.php';
?>
