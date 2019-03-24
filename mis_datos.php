<?php 	
	require_once 'includes/redireccion.php';

	require_once 'includes/header.php';

	$usuario = getUser($_SESSION['usuario']['id']);
?>

 	<form action="acciones/update_user.php" method="POST">
        <h1>Mis datos</h1>
        
        <!-- ALERTAS ERRORES/EXITO -->
        <?php if (@isset($_SESSION['alerta']['actualizar'])): ?>
            <p class="alert alert-success"><?= $_SESSION['alerta']['actualizar'] ?></p>         
        <?php elseif(isset($_SESSION['errores']['actualizar'])):  ?>
            <p class="alert alert-danger"><?= $_SESSION['errores']['actualizar'] ?></p>         
        <?php endif; ?>

        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input class="form-control" type="text" name="nombre" value="<?=$usuario[1]?>">

          <!-- ALERTA ERROR -->
          <?php if (@$_SESSION['errores']['nombre']): ?>
              <p class="text-danger alert-error">*<?= $_SESSION['errores']['nombre'] ?></p>         
          <?php endif ?>
        </div>

        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input class="form-control" type="text" name="apellido" value="<?=$usuario[2]?>">

          <!-- ALERTA ERROR -->
          <?php if (@$_SESSION['errores']['apellido']): ?>
              <p class="text-danger alert-error">*<?= $_SESSION['errores']['apellido'] ?></p>         
          <?php endif ?>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input class="form-control" type="email" name="email" value="<?=$usuario[3]?>">

          <!-- ALERTA ERROR -->
          <?php if (@$_SESSION['errores']['email']): ?>
              <p class="text-danger alert-error">*<?= $_SESSION['errores']['email'] ?></p>         
          <?php endif ?>
        </div>

        <button class="btn btn-block btn-primary" type="submit">Registrar</button>
    </form>
	

<?php 
	
	borrarErrores(); 
	require_once 'includes/aside.php'; 
	require_once 'includes/footer.php';
?>