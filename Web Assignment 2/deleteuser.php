<?php
session_start();
include "connection.php";
if(!isset($_SESSION["username"])){
	header("Location: login.php");
}
$id = $_GET["ID"];
$sqlremove = "DELETE FROM users WHERE username = '$id'";
if(mysqli_query($con, $sqlremove)){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else{
	echo "Error: " .mysqli_error($con);
}
?>