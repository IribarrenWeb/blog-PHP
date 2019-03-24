<?php   
    require_once 'includes/redireccion.php';

    require_once 'includes/header.php';

    $usuario_id = $_SESSION['usuario']['id'];
    $usuario_name = ucwords($_SESSION['usuario']['nombre'] );
    $entradas = getEntradas(false,false,$usuario_id);
?>
        <h1>Estas son tus entradas <span class="text-warning"><?= $usuario_name?></span></h1>
<?php 
    if (@isset($_SESSION['alerta']['eliminacion_entry'])):?>
            <div class="alert alert-success">
              <?= $_SESSION['alerta']['eliminacion_entry'] ?>
            </div>
<?php 
    endif;

    if ($entradas != NULL):
        while($entrada = mysqli_fetch_array($entradas)): 
?>
            <div class="entradas mt-2">                        
                <h3 class="h5 mb-0"><a href="entrada.php?id=<?=$entrada['id']?>" class=""><?= $entrada[3] ?></a></h3>
                <span class="text-muted d-block mb-2 mt-0"><?= strtoupper($entrada['categoria']) .' | '.$entrada['fecha'] ?></span>
                <p><?= substr($entrada[4],0,160).'...' ?></p>
            </div>  
<?php 
        endwhile;
    else : 
?>   
        <p class="p-5">Aun no tienes entradas creadas. <a href="new_entry.php">Crea una</a></p>
<?php 
    endif;
    require_once 'includes/aside.php'; 
    require_once 'includes/footer.php';
?>