<?php 
	require_once "config.php";
	$query = "
		CREATE TABLE users ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		name VARCHAR(100) NOT NULL,
		email VARCHAR(100) UNIQUE NOT NULL,
		score INT(10) NOT NULL)
	";

	$conn->query($query);
?>