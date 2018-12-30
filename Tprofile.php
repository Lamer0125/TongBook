
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Profile</title>
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
    <h1>Profile 
        <small>&nbsp;&nbsp; Change my profile</small>
    </h1>
</div>
<?php
include("config.php");
include("session.php");
$sql = mysqli_query($conn,"select * from users where uid = '$loginid_session' ");
$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
echo "User:".$login_session."<br>";
echo "Email:".$row["email"]."<br>";
echo "State:".$row["state"]."<br>";
?>

<div style="padding: 30px 30px 5px;">

   <form  method="post">
   <div class="input-group">
             <span class="input-group-addon">New name:</span>
            <input type="text" class="form-control" style="width:200px;height:30px" name="newname"><br>
       </div><br>
   	<input type="submit" name="" value="change username"><br>
   
   <br><br>
    <div class="input-group">
             <span class="input-group-addon">New email:</span>
            <input type="text" class="form-control" style="width:200px;height:30px" name="newemail"><br>
       </div><br>
   	<input type="submit" name="" value="change email"><br>
  
   <br><br>
   <div class="input-group">
             <span class="input-group-addon">New state:</span>
            <input type="text" class="form-control" style="width:200px;height:30px" name="newstate"><br>
       </div><br>
   	<input type="submit" name="" value="change state"><br>
   </form>
   
   
   <!-- jQuery (Bootstrap 插件需要引入) -->
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<!-- 包含了所有编译插件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</body>
</html>
<?php
	include('config.php');
	//include('session.php');
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(!empty($_POST["newemail"])){
			$newemail=$_POST["newemail"];
			$sql=mysqli_query($conn,"update users set email='$newemail' where uid='$loginid_session'");
			if(mysqli_affected_rows($conn))
				echo "Change email success!";
			else
				echo "Change Fail!";
		}
		if(!empty($_POST["newname"])){
			$newname=$_POST["newename"];
			$sql=mysqli_query($conn,"update users set uname='$newemail' where uid='$loginid_session'");
			if(mysqli_affected_rows($conn))
				echo "Change username success!";
			else
				echo "Change Fail!";
		}
		if(!empty($_POST["newstate"])){
			$newstate=$_POST["newstate"];
			$sql=mysqli_query($conn,"update users set state='$newstate' where uid='$loginid_session'");
			if(mysqli_affected_rows($conn))
				echo "Change state success!";
			else
				echo "Change Fail!";
		}
	}
	
?>




