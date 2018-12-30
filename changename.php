<?php
	include('config.php');
	include('session.php');
	$newname=$_POST["newname"];
	$sql=mysqli_query($conn,"update users set uname='$newname' where uid='$loginid_session'");
	if(mysqli_affected_rows($conn))
		echo "Change success!";
	else
		echo "Change Fail!";
?>