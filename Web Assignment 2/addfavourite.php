<?php
session_start();
include "connection.php";
if(!isset($_SESSION["username"])){
	header("Location: login.php");
}
$id = $_GET["ID"];
$username = $_SESSION["username"];
$sqladd = "INSERT INTO favourites (username, ItemID) VALUES ('$username', '$id')";
if(mysqli_query($con, $sqladd)){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else{
	echo "Error: " .mysqli_error($con);
}
?>