<?php
include "connection.php";
$sql = "SELECT * FROM Messages";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)){

	echo "<div>" .
         "<p>Name: ". $row["Name"] . 
	         "<br>Message: " . $row["Message"] .
			 "<br>Timestamp: " . $row["Timestamp"] .
	         "</p>" . 
	         "</div>";
	}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Read Messages</title>
</head>

<body>
 
</body>

</html>
