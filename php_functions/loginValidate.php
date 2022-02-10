<?php

require "connect.php";

//marrja e te dhenave me POST
$username = $_POST['usernameLogin'];
$password = $_POST['passLogin'];

$login = true;

//asnjera fushe
if(empty($username) && empty($password)) {
	$errorGen = "Te gjitha fushat duhet te plotesohen!";
	$login = false;
}
//te pakten njera nga fushat
else {
	//nese username eshte i zbrazet
	if(empty($username)) {
		$errorUsername = "Fusha e username-it duhet te plotesohet!";
		$login = false;
	}
	//nese username ka vlere
	else {
		//kontrollo nese useri ekziston ne db
		$query1 = "SELECT Username FROM users WHERE Username = '$username';";
		$query1Res = mysqli_query($connect, $query1);
		$count1 = mysqli_num_rows($query1Res);
		if($count1 == 0) {
			$errorUsername = "Ky perdorues nuk ekziston!";
			$login = false;
		}
	}
	
	//nese password eshte i zbrazet
	if(empty($password)) {
		$errorPassword = "Fusha e fjalekalimit duhet te plotesohet!";
		$login = false;
	}
	//nese password ka vlere
	else {
		//kontrollo nese fjalekalimi eshte i sakte
		$password1 = md5($password);
		$query2 = "SELECT Fjalekalimi FROM users WHERE Username = '$username';";
		$query2Res = mysqli_query($connect, $query2);
		$passwordRow = mysqli_fetch_array($query2Res);
		$passwordDB = $passwordRow['Fjalekalimi'];
		
		if($passwordDB != $password1) {
			$errorPassword = "Fjalekalimi nuk eshte i sakte!";
			$login = false;
		}
	}
	
	//nese ska asnje gabim
	if($login) {
		$_SESSION['usernameID'] = $username;
		
		$query3 = "SELECT roli FROM users WHERE Username = '$username';";
		$query3Res = mysqli_query($connect, $query3);
		$query3Row = mysqli_fetch_array($query3Res);
		$roli = $query3Row['roli'];
		
		$_SESSION['roli'] = $roli;
		
		header("Location: logedin.php");
	}
}
?>