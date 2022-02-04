<?php

session_start();

if(!isset($_SESSION['usernameID'])) {

?>

<!DOCTYPE html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<link rel="shortcut icon" type="image/x-icon" href="style/login.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body style="background-color:#f1f1f1;" >
											
				<div class="wrapper">
					</br>
					<div style="background-color:#ffffff;" class="centerformlogin" align="center">
						<img src="style/login.png" alt="icon" style="max-width:22%;height:auto;">
						<h1 class="maintext">Login </h1></br>
						<?php
						
						$errorGen = $errorUsername = $errorPassword = "";
						$username = "";
						
						if($_SERVER['REQUEST_METHOD'] == "POST") {
							//login
							include "php_functions/loginValidate.php";
						}
						?>
						<table>
							<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
								<tr>
									<td><i class="fa fa-user" style="font-size:24px">&nbsp;</i><input type = "text" name = "usernameLogin" style="padding:7px 7px;" value = "<?php echo $username;?>" placeholder =" Username"></td>
								</tr>
								<!--errors-->
								<tr>
									<td><?php echo "<span class = 'error'>$errorUsername</span>";?></td>
								</tr>
								<tr>
									<td><i class="fa fa-unlock-alt" style="font-size:24px">&nbsp;</i><input type = "password" name = "passLogin"  style="padding:7px 9px;" placeholder = " Password "></td>
								</tr>
								<!--errors-->
								<tr>
									<td><?php echo "<span class = 'error'>$errorPassword</span>";?></td></td>
								</tr>
								<tr>
									<td><?php echo "<span class = 'error'>$errorGen</span>";?></td>
								</tr>
								<tr>
									<td align="center"><input type = "submit"  class="cbtn" value="Login"</td>
								</tr>
							</form>
						</table>
					</div>
				</div>
				
			</div>
			<?php include "style/footer.php";?>
		</div>
	</body>
	
</html>

<?php
}

else {
	header("Location: logedin.php");
}?>