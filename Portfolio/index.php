<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joe's Test Site</title>
<?php include "scripts.php"; ?>
</head>

<body>
<?php 
$date = date("l F d, Y");
$usrName = "Joe";
$Gender = "Male";
?>
<?php 
$var1 = "True";
?>
<p>Date:<?php echo $date; ?><br>
Username:<?php echo $usrName; ?><br>
Gender:<?php echo $Gender; ?><br>
Age:<?php echo $Age; ?><br>
Phone:<?php echo $Phone; ?></p>
<?php
if($var1 == "True"){
	echo '<a href="http://www.google.co.uk">Google</a>';
} else {
	echo "Var1 is not True";
}
?>
</body>
</html> 
