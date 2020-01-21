<?php 

	// The following script Loggs the user out of the website

	session_start();
	session_unset();
	session_destroy();
	header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/login.php");

 ?>