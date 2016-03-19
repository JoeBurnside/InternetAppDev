  <?php
session_start();
include "connection.php";
if(!isset($_SESSION["username"])){
	header("Location: login.php");
}
$id = $_GET["ID"];
$username = $_SESSION["username"];
$sqlprice ="SELECT * FROM tbl_menu WHERE ID = '$id'";
$resultprice = mysqli_query($con, $sqlprice);
$row = mysqli_fetch_assoc($resultprice);
$price = $row["Price"];

$sqlfind = "SELECT * FROM basket WHERE username = '$username' AND ItemId = '$id'";
$resultcount = mysqli_query($con, $sqlfind);
$count = mysqli_num_rows($resultcount);
$row = mysqli_fetch_assoc($resultcount);

$quantity = $row["Quantity"];
if($quantity > 1){
$quantity = $quantity - 1;
$price = $price * $quantity;
$sqledit = "UPDATE basket SET Quantity = '$quantity', bskPrice = '$price' WHERE username = '$username' AND ItemId = '$id'";
if(mysqli_query($con, $sqledit)){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else{
	echo "Error: " .mysqli_error($con);
}
}
else{
$sqldelete = "DELETE FROM basket WHERE username = '$username' AND ItemId = '$id'";
if(mysqli_query($con, $sqldelete)){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else{
	echo "Error: " .mysqli_error($con);
}
}
?>