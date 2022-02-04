<?php

session_start();

if(isset($_SESSION['usernameID'])) {

echo 'you are loged in';
echo '</br>';
echo '<a href="php_functions/logout.php">log out</a>';

	}
else 
	header("Location: index.php");
	?>