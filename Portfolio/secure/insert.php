  <?php 
  //include the connection file
  include "connection.php"; 
  //prepare an sql statement leaving placeholders
  $stmt = $con->prepare("INSERT INTO messages (Name, Message) VALUES (?,?)");
  //fill the placeholders
  $stmt->bind_param("ss", $name, $message);
  //check that the name field is filled
  if(isset($_POST["name"])){
  //store the name field in the $name variable
  $name = $_POST["name"];

  }
  //check that the message field is filled
  if(isset($_POST["message"])){
  //store the massage field in the $message variable
  $message = $_POST["message"];

  }
  //execute the stored query
if($stmt->execute()){
	//redirect to the messages view page
		header("location: messages.php");
}
else{
	//display an error message
	echo "Error: " .mysqli_error($con);
}

  ?>
