<!DOCTYPE html>
<html>
<head>
  <title>Confirm Delete Messages</title>
</head>

<body>
<p>Are you sure you wish to delete this message?
<?PHP echo "<br><a href=delete.php?ID=" . $_GET["ID"] . ">Delete</a>" ?>
<br><a href=messages.php>Cancel</a></p>

 
</body>

</html>