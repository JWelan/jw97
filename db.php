<?php
// Variable Names
$ServerName="mysql-server-1.macs.hw.ac.uk";
$dbUsername="jw97";
$dbPassword="7Fgah5MtVW";
$dbName="jw97";

// Vatiable for connection to heriot watts MYSQL server, used in other scripts
$conn= mysqli_connect($ServerName, $dbUsername, $dbPassword, $dbName);

// If the connection fails send an error message
if(!$conn){
	die("connection failed: ".mysqli_connect_error());
}



?>