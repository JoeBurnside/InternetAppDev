<?php
include "connection.php";
$sql = "SELECT * FROM tbl_books JOIN tbl_publishers ON tbl_books.publisherid = tbl_publishers.publisherid";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)){

	echo "<div>" .
         "<p>Author: ". $row["author"] . 
	         "<br>Title: " . $row["title"] .
			 "<br><a href=detail.php?ID=" . $row["ID"] . ">Detail</a>" .
	         "</p>" . 
	         "</div>";
	}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Read Data</title>
</head>

<body>
 
</body>

</html>
