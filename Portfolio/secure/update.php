<?PHP
//include the connection file
include "connection.php";
//get the record id from the url
$id=$_GET["ID"];
//sql to selece record
$sql = "SELECT * FROM messages WHERE ID = '$id'";
//run the query and store result
$result = mysqli_query($con, $sql);
//get the result from the query
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
<title>Example of Update</title>
</head>

<body>

<form action="updatemess.php" method="post">
ID: <input type="text" name="id" value=<?php echo $row["ID"]; ?> readonly><p> 
Name: <input type="text" name="name" value=<?php echo $row["Name"]; ?>><p>
Message: <textarea name="message" rows="4" cols="30"><?php echo $row["Message"]; ?></textarea><p>
<input type="submit">
</form>

</body>

</html>
