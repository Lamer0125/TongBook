<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Register</title>
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
<div style="padding: 100px 100px 10px;">
	<form class="bs-example bs-example-form" role="form" method="post">
		<div class="input-group">
			<span class="input-group-addon">username</span>
			<input type="text" class="form-control" placeholder="username" name="username">
			</div><br>
		<div class="input-group">
			<span class="input-group-addon">email</span>
			<input type="text" class="form-control" placeholder="email" name="email">
			</div><br>
		<div class="input-group">
			<span class="input-group-addon">password</span>
			<input type="password" class="form-control" placeholder="password" name="password">
		</div><br>
		<div class="input-group">
			<span class="input-group-addon">state</span>
			<input type="text" class="form-control" placeholder="state" name="state">
		</div><br>
	
  
  <div style="padding: 20px 500px 200px;">
       <div class="row">
       
     
      <button type="submit" class="btn btn-default">Register</button>
    
     </div>
   </div>
   </form>
</div>
<!-- jQuery (Bootstrap 插件需要引入) -->
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<!-- 包含了所有编译插件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</body>
</html>

<?php 
include("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username=$_POST["username"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$state=$_POST["state"];
	$sql="insert into users(uname, email, password,state) values('".$_POST["username"]."','".$_POST["email"]."','".$_POST["password"]."','".$_POST["state"]."') ";
	if (mysqli_query($conn,$sql)== TRUE) {
    	echo "Register is sucessful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

?>

