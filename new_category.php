<?php 	
	require_once 'includes/redireccion.php';

	require_once 'includes/header.php';
?>

	<h1>Crear categoria</h1>
	<p class="text-center text-muted">Crea una nueva categoria para usarla en las entradas del blog.</p>
	<?php if (@isset($_SESSION['errores']['categoria'])): ?>
        <div class="alert alert-danger">
          <?= $_SESSION['errores']['categoria'] ?>
        </div>
    <?php elseif (@isset($_SESSION['alerta']['categoria'])):?>
    	<div class="alert alert-success">
          <?= $_SESSION['alerta']['categoria'] ?>
        </div>
    <?php endif; ?>
	<form class="form-group mt-5" action="acciones/categoria.php" method="POST" accept-charset="utf-8">
		<label for="nombre">Nombre de la categoria:</label>
		<input class="form-control" type="text" name="nombre" required>
		<button class="btn btn-block w-25 mx-auto mt-5 btn-success" type="submit">Guardar</button>
	</form>

<?php 
	
	borrarErrores(); 
	require_once 'includes/aside.php'; 
	require_once 'includes/footer.php';
?>
