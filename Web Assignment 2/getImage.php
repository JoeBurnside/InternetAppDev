<?php
include "connection.php";

$id = $_GET["ID"];

$sql = "SELECT * FROM tbl_menu WHERE ID = '$id'";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result);

header("Content-type:" . $row["imagetype"]);
echo $row["image"];

?>
