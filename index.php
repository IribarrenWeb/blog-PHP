<?php   require_once 'includes/header.php';   ?>


        
        <h1>Entradas recientes</h1>  
        

        <?php
            $entradas = getEntradas(true); 
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
            endif; 
        ?>        
        

        <a href="all_entry.php" class="btn btn-block btn-warning w-50 mx-auto mt-5 align-self-end"> Ver mas entradas</a>
      
<?php require_once 'includes/aside.php'; ?>

<?php require_once 'includes/footer.php'; ?>

