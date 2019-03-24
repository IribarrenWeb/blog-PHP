<?php 
  require_once 'includes/functions.php';
  
  if (!isset($_SESSION)) {
    session_start();
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <title>BLOG DE VIDEOJUEGOS</title>
  </head>
  <body class="">
      
     <!-- CABECERA -->
    <header id="header" class="w-75 m-auto">
        
        <!-- LOGO -->
        <div id="logo" class="navbar-brand mt-3">
          <a href="index.php">Blog de videojuegos</a>
        </div>
        
        <!-- NAVEGACION -->
        <nav id="nav" class="navbar border rounded mt-5 p-0 shadow-sm">
          <ul class="nav p-0">
            <li class="nav-item " ><a href="index.php" title="" class="nav-link text-secondary">Inicio</a></li>
            
            <!-- INICIO DE LAS CATEGORIAS -->
            <?php 
              $result = getCategorias(); 
              while($resultados = mysqli_fetch_array($result)) : ?>
                <li class="nav-item border-left" >
                    <a href="categorias.php?id=<?= $resultados[0].'&name='.$resultados[1] ?>" title="" class="nav-link text-secondary">
                      <?=ucwords(strtolower($resultados[1]))?>
                    </a>
                </li>
            <?php 
              endwhile; 
            ?>
            <!-- FIN DE LAS CATEGORIAS -->

            <li class="nav-item border-left" ><a href="#" title="" class="nav-link text-secondary">Sobre nosotros</a></li>
            <li class="nav-item border-left border-right" ><a href="#" title="" class="nav-link text-secondary">Contacto</a></li>
          </ul>
        </nav>

    </header><!-- /header -->
  
  
  <!-- CONTENEDOR DE LAS ENTRADAS -->
    <main id="contenedor" class="w-75 mx-auto row">

      <div class="col-8  bg-white shadow-sm p-3 rounded mt-4 border h-75">
      