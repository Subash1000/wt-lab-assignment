<?php
    //This to connect html file with sql file through php
	define ('dbhost', 'localhost'); //database host name(default: localhost)
	define ('dbuser', 'root'); //database user name
	define ('dbpass', ''); //for security create db and put password here
	define ('dbname', 'loginsystem'); //name of database
	
	$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname); //connect to databse using the following information entered
	
	//Check connection
	if($conn === false){
		die("ERROR: Could not connect.". mysqli_connect_error());
	}
?>