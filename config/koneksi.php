<?php

	$server 	= "localhost"; 
	$user 		= "root"; 
	$pass		= ""; 
	$database 	= "dblatihan"; 

	//koneksi database
	$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));


?>