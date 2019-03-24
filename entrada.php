<?php   
    if ($_GET) :
        require_once 'includes/header.php';
        $id_entry = isset($_GET['id']) ? $_GET['id'] : false;
        $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario']['id'] : false;
        $entry= getEntradas(false,$id_entry);
?>       
        <div class="entrada mt-2 px-4">   
        <?php if (@isset($_SESSION['errores']['entrada'])): ?>
                <div class="alert alert-danger">
                  <?= $_SESSION['errores']['entrada'] ?>
                </div>
        <?php endif ?>  

            <h2 class="text-primary"><?= $entry['titulo'] ?></h2>  
            
            <p class="h5 mt-3">Por: <?= $entry['usuario'] ?></p>
            <p class="h5">Fecha: <?= $entry['fecha'] ?></p>
            <p class="h5">Categoria: <?= $entry['categoria'] ?></p>
            <p class="mt-4"><?= $entry['descripcion'] ?></p>
            <?php if (isset($_SESSION['usuario']) && $usuario == $entry['usuario_id']): ?>                
                <div class="d-flex justify-content-around mt-5">
                    <a href="borrar_entry.php?id=<?=$id_entry?>" class="btn w-25 btn-danger">Eliminar</a>
                    <a href="edit_entry.php?id=<?=$id_entry?>" class="btn w-25 btn-primary">Editar</a>
                </div>
            <?php endif ?>
        </div>

<?php   
        borrarErrores();
        require_once 'includes/aside.php'; 
        require_once 'includes/footer.php'; 
    else:
        header('location:index.php');
    endif;
?>     