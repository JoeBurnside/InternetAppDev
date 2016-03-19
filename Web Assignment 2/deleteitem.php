<?php
session_start();
include "connection.php";
if(isset($_SESSION["username"])){
	if($_SESSION["level"] != "admin"){
		header("Location: user.php");
		}
	}
	else{
	header("Location: user.php");
	}
$id = $_GET["ID"];
$sqlremove = "DELETE FROM tbl_menu WHERE ID = '$id'";
if(mysqli_query($con, $sqlremove)){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else{
	echo "Error: " .mysqli_error($con);
}
?>