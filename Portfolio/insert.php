  <?php 
  include "connection.php"; 
  if(isset($_POST["name"])){

$name = $_POST["name"];

}
if(isset($_POST["message"])){

$message = $_POST["message"];

}
$sql = "INSERT INTO messages (Name, Message) VALUES ('$name', '$message')";
if(mysqli_query($con, $sql)){
		header("location: messages.php");
}
else{
	echo "Error: " .mysqli_error($con);
}

  ?>
