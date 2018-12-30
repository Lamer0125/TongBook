<!DOCTYPE html>
<html>
<head>
	<title>Post notes</title>
</head>
<body>
 <form action="" method="post">
 	Content：<input type="text" name="text">
 	Tags：<p>
 		Tourism<input type="checkbox" name="tag[]" value="Tourism"><br>
 		Shopping<input type="checkbox" name="tag[]" value="Shopping"><br>
 		Food<input type="checkbox" name="tag[]" value="Food"><br>
 		Transportation<input type="checkbox" name="tag[]" value="Transportation"><br>
 		Me<input type="checkbox" name="tag[]" value="Me"><br>
 	</p>
 	Location:<input type="number" name="latitude">
 			<input type="number" name="longitude"><br>
 	Visible range:
 			<input type="text" name="radius"><br>
 	Visible time:
 			From:<input type="date" name="from"> To:<input type="date" name="to"><br>
 			Starttime:<input type="time" name="starttime"> Endtime:<input type="time" name="endtime"><br>
 			Repetition frequency:<input type="text" name="repetition"><br>
 	Visible to:
 			All <input type="radio" name="view" value="all">
 			Friends <input type="radio" name="view" value="friends">
 			Me <input type="radio" name="view" value="me"><br>
 	<input type="submit" name="submite" value="submit"> 
 </form>
</body>
</html>
<?php
	include('session.php');
	include ('config.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		//$sql1="insert into location(latitude,longitude)values(".$_POST["latitude"].",".$_POST["longitude"].")";
		$sql1="insert into location(latitude,longitude)values(?,?)";
		$stmt=$conn->prepare($sql1);
		$stmt->bind_param("dd",$_POST["latitude"],$_POST["longitude"]);
		$sql2="insert into schedule(from1,until,repetition,starttime,endtime) values('".$_POST["from"]."','".$_POST["to"]."','".$_POST["repetition"]."',
		'".$_POST["starttime"]."','".$_POST["endtime"]."')";
	
		$str_tag="";
		$tag=$_POST["tag"];
		for($i=0;$i<count($tag);$i++){
			if($i==0)
				$str_tag=$tag[$i];
			else 
				$str_tag=$str_tag.",".$tag[$i];
		}
		$uid=$loginid_session;
		$radius=$_POST["radius"];
		$view=$_POST["view"];
		$text=$_POST["text"];
		if($stmt->execute()==true){
			$lid=mysqli_insert_id($conn);
		}
		else echo"Fail1";
		
		if(mysqli_query($conn,$sql2)==true){
			$sid=mysqli_insert_id($conn);
		}
		else echo"Fail2";
		$sql3="insert into note(uid,text,tags,lid,radius,sid,view) values('".$uid."','".$text."','".$str_tag."','".$lid."','".$radius."','".$sid."','".$view."')";
		if(mysqli_query($conn,$sql3)==true)
			echo "success";
		else {
			echo "Fail3!";
		}
	

	}
?>