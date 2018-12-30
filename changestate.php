<?php
	include('config.php');
	include('session.php');
	$newstate=$_POST["newstate"];
	$sql=mysqli_query($conn,"update users set state='$newstate' where uid='$loginid_session'");
	if(mysqli_affected_rows($conn))
		echo "Change success!";
	else
		echo "Change Fail!";
?>