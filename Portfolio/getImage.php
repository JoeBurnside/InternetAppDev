<?php
include "connection.php";

$id = $_GET["ID"];

$sql = "SELECT * FROM tbl_mybooks WHERE stockid_stk = '$id'";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result);

header("Content-type:" . $row["imageType_stk"]);
echo $row["image_stk"];

?>
