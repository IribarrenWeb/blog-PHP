</div>


 <!-- SIDEBAR -->
<aside id="sidebar" class="col-3 mx-auto p-0 shadow-sm mt-4 h-100">

  <!-- CONTENEDOR DEL BUSCADOR -->
    <div id="login" class="bg-white mb-4 p-3 shadow border border-secondary">
      <form action="buscador.php" method="POST">
        <h3>Buscador</h3>
        <div class="form-group">
          <input class="form-control" type="text" name="key" placeholder="Buscador...">
        </div>
        <button class="btn btn-block btn-primary" type="submit">Buscar</button>
      </form>
    </div>
  
  <!-- COMPROBAR QUE ESTA LOGGEADO -->
  <?php if (@!empty($_SESSION['clave']) && $_SESSION['clave'] == 778899) :?>
      <div id="login" class="bg-white mb-2 p-3 shadow border border-secondary">
          <p>Bienvenido <?= $_SESSION['usuario']['nombre'].'  '.$_SESSION['usuario']['apellido'] ?></p>
          <p><?= $_SESSION['usuario']['email']?></p>
          <hr>
          <!-- BOTONES DEL USUARIO -->
          <a class="btn btn-block btn-info" href="my_entrys.php">Mis entradas</a>
          <a class="btn btn-block btn-success" href="new_entry.php">Crear entrada</a>
          <a class="btn btn-block btn-success" href="new_category.php">Crear categoria</a>
          <a class="btn btn-block btn-primary" href="mis_datos.php">Mis datos</a>
          <a class="btn btn-block btn-danger" href="acciones/logout.php">Logout</a>
      </div>
  <?php endif ?>
  
  <!-- COMPROBACION DE LA SESSION -->
  <?php if (@!isset($_SESSION['clave']) && !isset($_SESSION['usuario'])): ?>

    <!-- CONTENEDOR DEL LOGIN -->
    <div id="login" class="bg-white  p-3 shadow border border-secondary">
      <form action="acciones/login.php" method="POST">
        <h3>Identificate</h3>
        <?php if (@isset($_SESSION['errores']['login'])): ?>
            <div class="alert alert-danger">
              <?= $_SESSION['errores']['login'] ?>
            </div>
        <?php endif ?>
        <div class="form-group">
          <label for="email">Email</label>
          <input class="form-control" type="text" name="email" placeholder="">
        </div>

        <div class="form-group">
          <label for="password">Contrasena</label>
          <input class="form-control" type="password" name="password" placeholder="">
        </div>

        <button class="btn btn-block btn-primary" type="submit">Ingresar</button>
      </form>
    </div>
    
    <!-- CONTENEDOR DEL REGISTRO -->
    <div id="registro" class="bg-white p-3 shadow border border-secondary mt-4">
      <form action="acciones/registro.php" method="POST">
        <h3>Registrate</h3>
        
        <!-- ALERTAS ERRORES/EXITO -->
        <?php if (@isset($_SESSION['alerta']['registro'])): ?>
            <p class="alert alert-success"><?= $_SESSION['alerta']['registro'] ?></p>         
        <?php elseif(isset($_SESSION['errores']['registro'])):  ?>
            <p class="alert alert-danger"><?= $_SESSION['errores']['registro'] ?></p>         
        <?php endif; ?>

        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input class="form-control" type="text" name="nombre" placeholder="">

          <!-- ALERTA ERROR -->
          <?php if (@$_SESSION['errores']['nombre']): ?>
              <p class="text-danger alert-error">*<?= $_SESSION['errores']['nombre'] ?></p>         
          <?php endif ?>
        </div>

        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input class="form-control" type="text" name="apellido" placeholder="">

          <!-- ALERTA ERROR -->
          <?php if (@$_SESSION['errores']['apellido']): ?>
              <p class="text-danger alert-error">*<?= $_SESSION['errores']['apellido'] ?></p>         
          <?php endif ?>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input class="form-control" type="email" name="email" placeholder="">

          <!-- ALERTA ERROR -->
          <?php if (@$_SESSION['errores']['email']): ?>
              <p class="text-danger alert-error">*<?= $_SESSION['errores']['email'] ?></p>         
          <?php endif ?>
        </div>

        <div class="form-group">
          <label for="password">Contrasena</label>
          <input class="form-control" type="password" name="password" placeholder="">

          <!-- ALERTA ERROR -->
          <?php if (@$_SESSION['errores']['password']): ?>
              <p class="text-danger alert-error">*<?= $_SESSION['errores']['password'] ?></p>         
          <?php endif ?>
        </div>

        <button class="btn btn-block btn-primary" type="submit">Registrar</button>
      </form>
    </div>

  <?php endif ?>
</aside>
<?php borrarErrores(); ?>