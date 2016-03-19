<?PHP
//include the connection file
include "connection.php";
//get the record id from the url
$id = $_GET["ID"];
//sql to delete record
$sql = "DELETE FROM Messages WHERE ID = '$id'";
//if the query works
if(mysqli_query($con, $sql))
{
	//redirect to the messages page
	header("Location:messages.php");
}
else
{
	//show an error
	echo mysqli_error($con);
}
?>