<?php 
	if(isset($_POST['reset'])){
		setcookie('name', null, -1, '/');
		setcookie('email', null, -1, '/');
		header("Location: ../index.php");
	} else {
		header("Location: ../index.php");
	}
?>