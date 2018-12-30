<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Send</title>
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
    <h1>Send request
        <small>&nbsp;&nbsp; See who you like</small> 
    </h1>
</div>


<div style="padding: 50px 50px 10px;">
	<form action="" method="post" class="bs-example bs-example-form" role="form">
		<div class="input-group input-group-lg">
			<span class="input-group-addon">Send request to</span>
			<input type="text" class="form-control" placeholder="name" name="send">
			</div><br>
			  <div style="padding: 20px 500px 200px;">
			  <input type="submit" class="btn btn-default" name="submit" value="submit">
			  </div>
	</form>

   
   
   
   <!-- jQuery (Bootstrap 插件需要引入) -->
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<!-- 包含了所有编译插件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</body>
</html>

<?php
	include('config.php');
	include('session.php');
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$uid1=$loginid_session;
		//echo $uid1;
		$uname=$_POST["send"];
		//$sql="select uid from users where uname='{$uname}'";
		$sql="select uid from users where uname=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("s",$uname);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=mysqli_fetch_array($result);
		$uid2=$row['uid'];
		//$sql1="insert into friendsrequest values('".$uid1."','".$uid2."',now(),0)";
		$sql1="insert into friendsrequest values(?,?,now(),0)";
		$stmt=$conn->prepare($sql1);
		$stmt->bind_param("ii",$uid1,$uid2);
			if($stmt->execute())==true)
				echo "Send success";
			else
				echo "Fail";
		
	}
?>