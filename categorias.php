<?php   
    if ($_GET) :
        require_once 'includes/header.php';
        $id_category = isset($_GET['id']) ? $_GET['id'] : false;
        $name_category = isset($_GET['name']) ? $_GET['name'] : false; 
        $entry_cate = getEntryCategory($id_category);  
?>
        
        <h1>Entradas de <span class="text-warning text-capitalize"><?= ucwords(strtolower($name_category)) ?></span></h1>  
        

        <?php

            if ($entry_cate && mysqli_num_rows($entry_cate) != 0 && $id_category != false):
                while($entrada = mysqli_fetch_array($entry_cate)): 
        ?>
                    <div class="entrada mt-2">                        
                        <h3 class="h5 mb-0"><a href="entrada.php?id=<?=$entrada['id']?>" class=""><?= $entrada[3] ?></a></h3>
                        <span class="text-muted d-block mb-2 mt-0"><?= strtoupper($entrada['categoria']) .' | '.$entrada['fecha'] ?></span>
                        <p><?= substr($entrada[4],0,160).'...' ?></p>
                    </div>  
        <?php 
                endwhile;
            else: 
        ?> 
                <p>No hay entradas en esta categoria...</p>
<?php 
            endif;
        require_once 'includes/aside.php'; 
        require_once 'includes/footer.php'; 
    else:
        header('location:index.php');
    endif;
?>     