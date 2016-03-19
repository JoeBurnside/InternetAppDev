<?php
session_start();
include "connection.php";
if(!isset($_SESSION["username"])){
	header("Location: login.php");
}
$id = $_GET["ID"];
$username = $_SESSION["username"];
$sqlremove = "DELETE FROM favourites WHERE username = '$username' AND ItemID = '$id'";
if(mysqli_query($con, $sqlremove)){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else{
	echo "Error: " .mysqli_error($con);
}
?>