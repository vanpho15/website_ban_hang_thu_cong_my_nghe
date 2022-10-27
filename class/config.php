<?php

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
	require_once 'vendor/autoload.php';
	// init configuration
	$clientID = '864416101966-8n0r7nv26a53e8ubl82c4vim1clpakga.apps.googleusercontent.com';
	$clientSecret = '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';
	$redirectUri = 'https://mynghe.com/mynghe/index.php';
	// create Client Request to access Google API
	$client = new Google_Client();
	$client->setClientId($clientID);
	$client->setClientSecret($clientSecret);
	$client->setRedirectUri($redirectUri);
	$client->addScope("email");
	$client->addScope("profile");
	// google recaptcha
	$siteKey = "6LdP2XgiAAAAAGBOUCSACJa6ohQSMpXVqilPrmnE";
	$secretKey = "6LdP2XgiAAAAAAN7loCQ0CNUOmq3ChFMLJwX-z0_";
?>