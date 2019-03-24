<?php   

    if ($_POST) :
        
        require_once 'includes/header.php';   
        require_once 'includes/conex.php';
        
        $keyword = isset($_POST['key']) ? $_POST['key'] : false;

        if (!$keyword) {
            goto retorno;
        }
?>
        
        <h1 class="text-left px-3 mt-4">Buscar: <?= $keyword ?></h1>  
        

        <?php
            $entradas = getEntradas(false,false,false,$keyword); 
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
            else: 
        ?>       
                <p class="px-4">No se encontraron resultados...</p>
        <?php endif ?> 
        
      
<?php 
        require_once 'includes/aside.php'; 
        require_once 'includes/footer.php'; 

    else:
        retorno:
        header('location:index.php');
    endif;
?>
