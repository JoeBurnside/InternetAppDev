<?php
session_start();
include "connection.php";

if(isset($_POST["username"])){
	$username = $_POST["username"];
}

if(isset($_POST["password"])){
	$password = $_POST["password"];
}

$stmt = $con->prepare("SELECT * FROM users WHERE Username = ? and pass = ?");
$stmt->bind_param("ss", $username, $password);

$stmt->execute();
$result = $stmt->get_result();

$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) == 1){
	
	$_SESSION["username"] = $username;
	$_SESSION["level"] = $row["Level"];

	if($_SESSION["level"] == "admin"){
		header("Location: admin.php");
		}	
	else{
		header("Location: user.php");
		}
}

else{	
	echo header("Location: login.php");
}

?>