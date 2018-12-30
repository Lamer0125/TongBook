<?php
	include("config.php");
	$lat=$_POST["latitude"];
	$lng=$_POST["longitude"];
	$current_time=$_POST["time"];
	$current_date=$_POST["date"];
	$sql="update current  set latitude='$lat',longitude='$lng', time='$current_time',date='$current_date' where id=1";
	if(mysqli_query($conn,$sql)){
		echo "Set succeed!";
	}
?>