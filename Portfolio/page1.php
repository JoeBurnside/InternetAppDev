<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joe's Test Site</title>
</head>

<body>
<form action="page2.php" method="post">
<p>Name:  	<input name="name" type="text" size="30" maxlength="30" /> </p>
<p>Age:  	<input name="age" type="text" size="3" maxlength="3" />  </p>
<p>Gender:  	<input name="gender" type="text" size="6" maxlength="6" /> </p>
<p>Email:  	<input name="email" type="text" size="50" maxlength="50" /> </p>
<p>Phone No:  	<input name="phone" type="text" size="30" maxlength="30" /> </p>
<p>Date:  	<input name="timedate" type="text"  value="<?php echo date("l dS Y M h:i:s A");?>" size="60" maxlength="60" /></p>
<p> 		<input type="hidden" name="ID" value="N0451564" />
 <input type="submit" /> </p>
</form>
</body>
</html> 
