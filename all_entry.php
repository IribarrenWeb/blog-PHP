<?php   require_once 'includes/header.php';   ?>


        
        <h1>Todas las entradas</h1>  
        

        <?php
            $entradas = getEntradas(); 
            if ($entradas != NULL):
                while($entrada = mysqli_fetch_array($entradas)): 
        ?>
                    <div class="entradas mt-2">                        
                        <h3 class="h5 mb-0"><a href="entrada.php?id=<?=$entrada['id']?>" class=""><?= $entrada[3] ?></a></h3>
                        <span class="text-muted d-block mb-2 mt-0"><?= $entrada['categoria'] .' | '.$entrada['fecha'] ?></span>
                        <p><?= substr($entrada[4],0,160).'...' ?></p>
                    </div>  
        <?php 
                endwhile;
            endif; 
        ?>        
      
<?php require_once 'includes/aside.php'; ?>

<?php require_once 'includes/footer.php'; ?>