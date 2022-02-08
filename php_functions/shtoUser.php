<?php 
	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	require "connect.php";
	//seting default variabels
	$id="";
	$username ="";
	$emri ="";
	$mbiemri ="";
	$phone ="";
	$address ="";
	$path ="";
	$update = false;	
	//Inserting
	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$username = $_POST['username'];
		$emri = $_POST['emri'];
		$mbiemri = $_POST['mbiemri'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$image = $_POST['image'];
		$target_dir = "../images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){}
		$path =htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
		
	$query=("INSERT INTO user_details(id,Username,emri, mbiemri,phone,address,image) VALUES ('','$username','$emri','$mbiemri','$phone','$address','$path')");
	$queryrez = mysqli_query($connect,$query);
	$rez = mysqli_affected_rows($connect);
	if($rez != 0){
		$_SESSION['succes'] ="<script> window.onload = function() {sucess();}; </script>"; 
	}
	else{
		$_SESSION['succes'] ="<script> window.onload = function() {fail();}; </script>"; 
	}
	//
	header("location: ../logedin.php");
	}
	//Delete
	if(isset($_GET['Delete'])){
		$idd = $_GET['Delete'];
		$path2 = $_GET['image'];
		$filename = "../images/$path2";
		 if (file_exists($filename)) {
		 unlink($filename);
		 }
		$querydel=("DELETE FROM user_details WHERE id='$idd'");
		$queryrezdel = mysqli_query($connect,$querydel);
		$rez = mysqli_affected_rows($connect);
		if($rez != 0){
			$_SESSION['succes'] ="<script> window.onload = function() {sucess();}; </script>"; }
		else{
			$_SESSION['succes'] ="<script> window.onload = function() {fail();}; </script>";}
		header("location: ../logedin.php");
	}
			
	//Updating
	if(isset($_GET['Update'])){
		$idu = $_GET['Update'];
		$queryup=("SELECT * FROM user_details WHERE id=$idu");
		$queryrezup = mysqli_query($connect,$queryup);
			$result = mysqli_fetch_array($queryrezup);
			$id =$result['id'];
			$username = $result['Username'];
			$emri = $result['emri'];
			$mbiemri = $result['mbiemri'];
			$phone = $result['phone'];
			$address = $result['address'];
			$image = $result['image'];
			$update = true;
		
	}
	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$username = $_POST['username'];
		$emri = $_POST['emri'];
		$mbiemri = $_POST['mbiemri'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$path3 = $_POST['path'];
		$filename = "../images/$path3";
		 if (file_exists($filename)) {
		 unlink($filename);
		 }
		$target_dir = "../images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){}
		$path =htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
	$queryup1=("UPDATE user_details SET Username='$username',emri='$emri',mbiemri='$mbiemri',address='$address',phone='$phone',image='$path' WHERE id='$id';");
	$queryupdate2 = mysqli_multi_query($connect,$queryup1);
	$rez = mysqli_affected_rows($connect);
	if($rez != 0){
		$_SESSION['succes'] ="<script> window.onload = function() {sucess();}; </script>"; }
	else{
		$_SESSION['succes'] ="<script> window.onload = function() {fail();}; </script>";}
	header("location: ../logedin.php");
	}

?>


