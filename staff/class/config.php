<?php

	@define ( SERVERNAME , "localhost" );

	@define ( USERNAME , "root" );

	@define ( PASSWORD , "" );

	@define ( DATABASE , "myngheviet" );
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myngheviet";
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	if (!$conn) {
		echo "Database connection error" . mysqli_connect_error();
		exit();
	} else {
		mysqli_set_charset($conn, 'UTF8');
	}

?>