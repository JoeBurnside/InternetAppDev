<?php
include "connection.php";

$sql = "SELECT * FROM tbl_mybooks";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($result)){
	echo "<p>Name: " . $row["title_stk"] .
	     "<br>Image: <img src=getImage.php?ID=" . $row["stockid_stk"] . " width=100, height=100>";
}

?>
