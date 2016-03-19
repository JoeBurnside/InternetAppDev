<?php
include "connection.php";
$id = $_GET["ID"];
$sql = "SELECT * FROM tbl_books JOIN tbl_publishers ON tbl_books.publisherid = tbl_publishers.publisherid WHERE ID = '$id' ";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
if($count > 0){
while($row = mysqli_fetch_assoc($result)){

	echo "<div>" .
         "<p>ID: " . $row["ID"] . 
	         "<br>Author: ". $row["author"] . 
	         "<br>Title: " . $row["title"] .
			 "<br>Publisher: " . $row["publisherName"] .
			 "<br>Description: " . $row["description"] .
	         "<br>Price: " . $row["unitprice"] .
		     "<br>Quantity: " . $row["quantity"] .
	         "</p>" . 
	         "</div>";
			 $author = $row["author"];
	}
$sql2 = "SELECT * FROM tbl_books WHERE author = '$author'";
$result2 = mysqli_query($con, $sql2);
echo "<p>Books by this Author</p>";
while($row = mysqli_fetch_assoc($result2)){

	echo "<div>" .
         "<p>Title: " . $row["title"] .
			 "<br><a href=detail.php?ID=" . $row["ID"] . ">Detail</a>" .
	         "</p>" . 
	         "</div>";
	}
}
else
{ echo "<p>No results were found</p>";}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Read Data</title>
</head>

<body>
 
</body>

</html>
