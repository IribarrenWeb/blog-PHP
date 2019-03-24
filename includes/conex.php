<?php 

	
	$server = 'localhost';
	$username = 'root';
	$pass = '';
	$database = 'blog_curso';

	$conex = mysqli_connect($server,$username,$pass,$database);

	mysqli_query($conex,"SET NAMES 'utf8'");
 
