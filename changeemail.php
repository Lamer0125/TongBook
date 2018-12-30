<?php
	include('config.php');
	include('session.php');
	$newemail=$_POST["newemail"];
	$sql=mysqli_query($conn,"update users set email='$newemail' where uid='$loginid_session'");
	if(mysqli_affected_rows($conn))
		echo "Change success!";
	else
		echo "Change Fail!";
?>