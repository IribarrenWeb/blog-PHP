<?php 

	if (!isset($_SESSION)) {
		session_start();
	}

	if (!isset($_SESSION['usuario']) && $_SESSION['clave'] != 778899) {
		header('location:index.php');
	}