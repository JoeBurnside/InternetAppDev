<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joe's Test Site</title>
</head>

<body>
<p>Welcome 	<?php echo $_POST["name"]; ?></p>
<p>You are 	<?php echo $_POST["age"]; ?> years old.</p>
<p>Your gender is <?php echo $_POST["gender"]; ?></p>
<p>Your Email address is <?php echo $_POST["email"]; ?></p>
<p>Your Telephone Number is <?php echo $_POST["phone"]; ?></p>
<p>Your Personal ID is <?php echo $_POST["ID"]; ?></p>
<p>The date and time is <?php echo $_POST["timedate"]; ?></p>
</body>
</html> 
