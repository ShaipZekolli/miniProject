<?php

session_start();

if(isset($_SESSION['usernameID'])) {
	if($_SESSION['roli'] == 1){
?>

<!DOCTYPE html>
	<head>
		<title>CRUD Users</title>
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<link rel="shortcut icon" type="image/x-icon" href="style/login.png">
	</head>
		<body style="background-color:#f1f1f1;">
			<div style="margin-top:0px;background-color: gray;">
						</br>
															<?php if(isset($_SESSION['succes']))
																echo $_SESSION['succes'];
																unset($_SESSION['succes']);
															?>						
													<div class="w3-row-padding" style="margin:4px 40px 40px 40px;background-color:white;border:0px sloid;border-radius:7px">
														<h1> 
															<?php 
															echo '<i class="fa fa-user-circle-o" style="font-size:40px"></i> Users';
															?>
														 </h1>
													
														
															<th><a href="#shto" onclick="toggle_visibility('shto');" style ="padding:6px 6px;margin-right:40px;color:black;background-color:#6ee96e;border-radius: 4px;font-size:11px" class="btn w3-right" ><b>+ Shtoni një agjent</b></a></th>
															<th><a href="php_functions/logout.php" style ="padding:6px 6px;margin-right:20px;color: #D8000C;background-color: #FFD2D2;border-radius: 4px;font-size:11px" class="btn w3-right" ><b>Log out</b></a></th>
														</br></br></br><div>	
															<?php require "php_functions/connect.php";
															$selectQuery = "SELECT *
																	FROM user_details ";
															$selectQueryRes = mysqli_query($connect, $selectQuery);
													//marrja e te dhenave nga rreshtat rezultat
															echo "<table class = 'exams'>
																<tr class = 'exams'>
																	<th class = 'exams'>Picture</th>
																	<th class = 'exams'>Username</th>
																	<th class = 'exams'>Emri</th>
																	<th class = 'exams'>Mbiemri</th>
																	<th class = 'exams'>Phone</th>
																	<th class = 'exams'>Address</th>
																	<th class = 'exams'></th>
																	
																	<th class = 'exams'></th>
																</tr>";
															
															if(mysqli_num_rows($selectQueryRes) == 0) {
																echo "<tr class = 'exams'>
																		<td class = 'exams' colspan = '5'>Nuk ka te dhena</td>
																	</tr>";
																	}

															while($rreshti = mysqli_fetch_array($selectQueryRes)) {
																$id =$rreshti['id'];
																$username = $rreshti['Username'];
																$emri = $rreshti['emri'];
																$mbiemri = $rreshti['mbiemri'];
																$phone = $rreshti['phone'];
																$address = $rreshti['address'];
																$image = $rreshti['image'];
														
															echo "<tr class = 'exams'>
																	<td class = 'exams' style='max-width: 250px;overflow: hidden;'><img style='width:20%;' src='images/$image' alt='$image'></img></td>
																	<td class = 'exams'><i class='fa fa-user-circle-o' style='font-size:20px'></i> $username</td>
																	<td class = 'exams'>$emri</td>
																	<td class = 'exams'>$mbiemri</td>
																	<td class = 'exams'>$phone</td>
																	<td class = 'exams' style='max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'>$address</td>
																	<td class = 'exams'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href = 'logedin.php?Update=$id' style='background-color:black;padding:7px 15px;' class = 'btn'>Edit</a></td>
																	<td class = 'exams'><a href = 'php_functions/shtoUser.php?Delete=$id&image=$image' style ='color: #D8000C;background-color: #FFD2D2;padding:7px 7px;' class = 'btn'>Delete</a></td>
																</tr>";
															}

															echo "</table>";
															?></div>
														</br></br></br></br>
													</div>
												<div <?php include "php_functions/shtoUser.php"; if($update == true){echo 'style="display:block;"';}else {echo 'style="display:none;"';}?> class="center"   id="shto" >
														<a href="#" onclick="toggle_visibility('shto');" style ="padding:6px 6px;align:right;color:black;background-color:#FFD2D2;border-radius: 4px;font-size:11px" class="btn w3-right" ><b>&nbsp;X&nbsp;</b></a>
															</br><h2 style="color:#5f6368;">Shtoni një User</h2>
															<?php include "php_functions/shtoUser.php" ?>
														<div style="padding:6%">
															<form action="php_functions/shtoUser.php" method="POST"  enctype="multipart/form-data">
															
															<input type="text" required name="username" value="<?php echo $username;?>" placeholder="Username">&nbsp;</br>
															<input type="text" required name="emri" value="<?php echo $emri;?>" placeholder="Emri">&nbsp;
															<input type="text" required name="mbiemri" value="<?php echo $mbiemri;?>" placeholder="Mbiemri">&nbsp;</br>
														    <input type="text"  name="phone" value="<?php echo $phone;?>" placeholder="NumriTelefonit">&nbsp;
															<input type="text"  name="address" value="<?php echo $address;?>" placeholder="Street">&nbsp;</br>
															<input type="file" required placeholder="Image to Upload:" name="fileToUpload" id="fileToUpload" value="<?php echo $image;?>">&nbsp;</br>
															<input type="hidden"  name="path" value="<?php echo $image;?>">&nbsp;</br>
															<input type="hidden"  name="id" value="<?php echo $id;?>">
															<?php if($update == true)
																	echo'&nbsp;&nbsp;&nbsp;<input style="padding:7px 12px;" type="submit" name="update" value=" Edit ">';
																else 
																	echo'&nbsp;&nbsp;&nbsp;<input style="padding:7px 7px;" type="submit" name="submit" value=" Regjistro ">';
																?>
															</form>
														</div>
												</div>							
						<?php include "style/footer.php";?>
			</div>
		</body>
	<script>
		function toggle_visibility(shto) {
           var e = document.getElementById(shto);
           if(e.style.display == 'block')
              e.style.display = 'none';
           else
              e.style.display = 'block';
        }
		function fail(){
        swal({
			  title: 'Oeperation Failed?',
			  type: 'error',
			  confirmButtonColor: '#DD6B55',
			  confirmButtonText: 'Ok!'
			});
		}
		function sucess(){
       swal(
			  'Success!',
			  'Oeperation Successful!',
			  'success'
			)
		}
		
	</script>
	<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
</html>

<?php
	}
	if($_SESSION['roli'] == 2){ ?>
		<!DOCTYPE html>
	<head>
		<title>My Profile</title>
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<link rel="shortcut icon" type="image/x-icon" href="style/login.png">
	</head>
		<body style="background-color:#f1f1f1;">
			<div style="margin-top:0px;background-color: gray;">
						</br>
															<?php if(isset($_SESSION['succes']))
																echo $_SESSION['succes'];
																unset($_SESSION['succes']);
															?>						
													<div class="w3-row-padding" style="margin:4px 40px 40px 40px;background-color:white;border:0px sloid;border-radius:7px">
														<h1> 
															<?php 
															echo '<i class="fa fa-user-circle-o" style="font-size:40px"></i> Profile';
															?>
														 </h1>
													
														
															
															<th><a href="php_functions/logout.php" style ="padding:6px 6px;margin-right:20px;color: #D8000C;background-color: #FFD2D2;border-radius: 4px;font-size:11px" class="btn w3-right" ><b>Log out</b></a></th>
														</br></br></br><div>	
															<?php require "php_functions/connect.php";
															$user=$_SESSION['usernameID'];
															$selectQuery = "SELECT *
																	FROM user_details WHERE Username='$user'";
															$selectQueryRes = mysqli_query($connect, $selectQuery);
													//marrja e te dhenave nga rreshtat rezultat
															echo "<table class = 'exams'>
																<tr class = 'exams'>
																	<th class = 'exams'>Picture</th>
																	<th class = 'exams'>Username</th>
																	<th class = 'exams'>Emri</th>
																	<th class = 'exams'>Mbiemri</th>
																	<th class = 'exams'>Phone</th>
																	<th class = 'exams'>Address</th>
																	<th class = 'exams'></th>
																	
																	<th class = 'exams'></th>
																</tr>";
															
															if(mysqli_num_rows($selectQueryRes) == 0) {
																echo "<tr class = 'exams'>
																		<td class = 'exams' colspan = '5'>Nuk ka te dhena</td>
																	</tr>";
																	}

															while($rreshti = mysqli_fetch_array($selectQueryRes)) {
																$id =$rreshti['id'];
																$username = $rreshti['Username'];
																$emri = $rreshti['emri'];
																$mbiemri = $rreshti['mbiemri'];
																$phone = $rreshti['phone'];
																$address = $rreshti['address'];
																$image = $rreshti['image'];
														
															echo "<tr class = 'exams'>
																	<td class = 'exams' style='max-width: 250px;overflow: hidden;'><img style='width:20%;' src='images/$image' alt='$image'></img></td>
																	<td class = 'exams'><i class='fa fa-user-circle-o' style='font-size:20px'></i> $username</td>
																	<td class = 'exams'>$emri</td>
																	<td class = 'exams'>$mbiemri</td>
																	<td class = 'exams'>$phone</td>
																	<td class = 'exams' style='max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'>$address</td>
																	
																	<td class = 'exams'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href = 'logedin.php?Update=$id'  style='background-color:black;padding:7px 15px;' class = 'btn'>Edit</a></td>
																	<td class = 'exams'><a href = 'php_functions/shtoUser.php?Delete=$id&image=$image' style ='color: #D8000C;background-color: #FFD2D2;padding:7px 7px;' class = 'btn'>Delete</a></td>
																</tr>";
															}

															echo "</table>";
															?></div>
														</br></br></br></br>
													</div>
												<div <?php include "php_functions/shtoUser.php"; if($update == true){echo 'style="display:block;"';}else {echo 'style="display:none;"';}?> class="center"  id="shto" >
														<a href="#" onclick="toggle_visibility('shto');" style ="padding:6px 6px;align:right;color:black;background-color:#FFD2D2;border-radius: 4px;font-size:11px" class="btn w3-right" ><b>&nbsp;X&nbsp;</b></a>
															</br><h2 style="color:#5f6368;">Edit</h2>
															<?php include "php_functions/shtoUser.php" ?>
														<div style="padding:6%">
															<form action="php_functions/shtoUser.php" method="POST"  enctype="multipart/form-data">
															
															<input style="background-color:lightgrey;" type="text" required readonly name="username" value="<?php echo $username;?>" placeholder="Username">&nbsp;</br>
															<input type="text" required name="emri" value="<?php echo $emri;?>" placeholder="Emri">&nbsp;
															<input type="text" required name="mbiemri" value="<?php echo $mbiemri;?>" placeholder="Mbiemri">&nbsp;</br>
														    <input type="text"  name="phone" value="<?php echo $phone;?>" placeholder="NumriTelefonit">&nbsp;
															<input type="text"  name="address" value="<?php echo $address;?>" placeholder="Street">&nbsp;</br>
															<input type="file" required placeholder="Image to Upload:" name="fileToUpload" id="fileToUpload" value="<?php echo $image;?>">&nbsp;</br>
															<input type="hidden"  name="path" value="<?php echo $image;?>">&nbsp;</br>
															<input type="hidden"  name="id" value="<?php echo $id;?>">
															<?php if($update == true)
																	echo'&nbsp;&nbsp;&nbsp;<input style="padding:7px 12px;" type="submit" name="update" value=" Edit ">';
																else 
																	echo'';
																?>
															</form>
														</div>
												</div>							
						<?php include "style/footer.php";?>
			</div>
		</body>
	<script>
		function toggle_visibility(shto) {
           var e = document.getElementById(shto);
           if(e.style.display == 'block')
              e.style.display = 'none';
           else
              e.style.display = 'block';
        }
		function fail(){
        swal({
			  title: 'Oeperation Failed?',
			  type: 'error',
			  confirmButtonColor: '#DD6B55',
			  confirmButtonText: 'Ok!'
			});
		}
		function sucess(){
       swal(
			  'Success!',
			  'Oeperation Successful!',
			  'success'
			)
		}
		
	</script>
	<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
</html>
<?php
	}
}

else {
	header("Location: index.php");
}?>