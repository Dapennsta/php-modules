<?php
	// Connect to MySQL
	$con = mysqli_connect('localhost','root','','shoutit');

	// Test connection
	if (mysqli_connect_error()) {
		echo 'Failed to connect to MySQL: '.mysqli_connect_error(); 
	}
?>