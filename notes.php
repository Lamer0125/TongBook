<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>notes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
<style>
 body {
	padding-top: 50px;
    padding-left: 50px;
}
</style>
<!--[if lt IE 9]>
	<script src="https://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
<![endif]-->
</head>
<body>
  <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Menu</a>
		</div>
		<div class="collapse navbar-collapse" >
			<ul class="nav navbar-nav">
				<li class="active"><a href="Home.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="Tprofile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
				<li><a href="Tpost.php"><span class="glyphicon glyphicon-pencil"></span> Post</a></li>
				<li><a href="notes.php"><span class="glyphicon glyphicon-tags"></span> Notes</a></li>
				<li><a href="filter.php"><span class="glyphicon glyphicon-road"></span> Filter</a></li>
				<li><a href="send.php"><span class="glyphicon glyphicon-send"></span> Request</a></li>
				<li><a href="receive.php"><span class="glyphicon glyphicon-envelope"></span> Recieve</a></li>
			</ul>
			<div class="btn-group pull-right">
            <div style="padding:10px 10px 10px;">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Menu <span class="caret"></span></button>
		<ul class="dropdown-menu" role="menu">
			<li><a href="login.php">Login</a></li>
			<li><a href="Tregister.php">Register</a></li>
			
		</ul>
	    </div>   
</div>
		
		</div><!-- /.nav-collapse -->
	</div><!-- /.container -->
</div>

<div class="page-header">
    <h1>Notes
        <small>&nbsp;&nbsp; See what's good near me</small>
    </h1>
</div>
<?php
include("config.php");
include("session.php");
$sql1="select n.nid,n.text  from  users u,note n, filter f, schedule s1,schedule s2,current c, location l1,location l2 where f.uid='$loginid_session' and u.uid='$loginid_session' and u.state= f.state and f.lid=l1.lid and l1.longitude=c.longitude and l1.latitude=c.latitude and f.tag=n.tags and f.sid=s1.sid and c.date>=s1.from1 and c.date<=s1.until and c.time>=s1.starttime and n.sid= s2.sid and c.date>=s2.from1 and c.date<=s2.until and c.time>=s2.starttime and c.time<=s2.endtime and n.lid=l2.lid and power(power(l2.latitude-c.latitude,2)+power(l2.longitude-c.longitude,2),0.5)<n.radius and (n.view='all' or n.view='me')";
$sql2="select n.nid,n.text from  users u,note n, filter f, schedule s1,schedule s2,current c, location l1,location l2 where f.uid='$loginid_session' and u.uid='$loginid_session' and u.state= f.state and f.lid=l1.lid and l1.longitude=c.longitude and l1.latitude=c.latitude and f.tag=n.tags and f.sid=s1.sid and c.date>=s1.from1 and c.date<=s1.until and c.time>=s1.starttime and n.sid= s2.sid and c.date>=s2.from1 and c.date<=s2.until and c.time>=s2.starttime and c.time<=s2.endtime and n.lid=l2.lid and power(power(l2.latitude-c.latitude,2)+power(l2.longitude-c.longitude,2),0.5)<n.radius and  n.view='friends'
	and n.uid in (select uid1 from friendsrequest where uid2='$loginid_session' and status=1)";
//echo $loginid_session;
$res1=array();
$res2=array();
if($result=mysqli_query($conn,$sql1)){
	if(mysqli_num_rows($result)!=0){
		//echo "lll".mysqli_num_rows($result);
		while($row=mysqli_fetch_array($result)){
			$res1[]=$row['nid'];
			$res2[]=$row['text'];
			//echo $row['text'];
		}
	}
	else 
		echo"kkk1";
}
else
	echo $conn->error;
//echo $res2[0];
if($result=mysqli_query($conn,$sql2)){
	if(mysqli_num_rows($result)!=0){
		//echo "lll".mysqli_num_rows($result);
		while($row=mysqli_fetch_array($result)){
			$res1[]=$row['nid'];
			$res2[]=$row['text'];
		}
	}
}
else
	echo $conn->error;
for($i=0;$i<count($res1);$i++){
	echo $res2[$i].'<form method="post" style="padding:30px 30px 10px;"> 
                    <input type="text" name='.$res1[$i].'> <input type="submit" value="comment"></form>';
}
for($i=0;$i<count($res1);$i++){
	if(!empty($_POST[$res1[$i]])){
		$sql="insert into comments values('$res1[$i]','$loginid_session',now(),'".$_POST[$res1[$i]]."')";
		if(mysqli_query($conn,$sql)==true){
			echo "You have commented successfully.";
		}
	}
}
?>



   
   
   
   <!-- jQuery (Bootstrap 插件需要引入) -->
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<!-- 包含了所有编译插件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</body>
</html>
