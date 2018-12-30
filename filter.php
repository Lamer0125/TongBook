<?php
	include('config.php');
	include("session.php");
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
		$state=$_POST["state"];
		if($stmt->execute();==true){
			$lid=mysqli_insert_id($conn);
		}
		else echo"Fail1";
		if(mysqli_query($conn,$sql2)==true){
			$sid=mysqli_insert_id($conn);
		}
		else echo"Fail2";
		//$sql3="insert into filter(uid,tag,lid,sid,state) values('".$uid."','".$str_tag."','".$lid."','".$sid."','".$state."')";
		$sql3="insert into filter(uid,tag,lid,sid,state) values(?,?,?,?,?)";
		$stmt=$conn->prepare($sql3);
		$stmt->bind_param("isiis",$uid,$str_tag,$lid,$sid,$state);
		//$stmt->execute();
		if($stmt->execute()==true)
			echo "success";
		else {
			echo "Fail3!";
		}
	

	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>post</title>
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
    <h1>Filter 
        <small>&nbsp;&nbsp; What I want to see</small>
    </h1>
</div>
 <form action="" method="post" class="bs-example bs-example-form" role="form">

		<div class="row" style="padding: 5px 30px;">
			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon">Tags:&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="tag[]" value="Tourism">Tourism&nbsp;
						<input type="checkbox" name="tag[]" value="Shopping">Shopping&nbsp;
						<input type="checkbox" name="tag[]" value="Food">Food&nbsp;
						<input type="checkbox" name="tag[]" value="Transportation">Transportation&nbsp;
						<input type="checkbox" name="tag[]" value="Me">Me&nbsp;<br>
					</span>
					
				</div><!-- /input-group -->
			</div><!-- /.col-lg-6 --><br>
			
		</div><!-- /.row -->


     <div style="padding: 20px 30px;">
       <div class="input-group">
            <span class="input-group-addon">Location:</span>
            <input type="number" class="form-control" style="width:300px;height:30px" name="latitude">
            <input type="number" class="form-control" style="width:300px;height:30px" name="longitude"><br>
       
       </div><br>
       <div class="input-group">
            <span class="input-group-addon">Visible time:
            From:</span>
            <input type="date" class="form-control" style="width:542px;height:30px" name="from">
       </div>
       <div class="input-group">
            <span class="input-group-addon">To:</span>
            <input type="date" class="form-control" style="width:639px;height:30px" name="to"><br>
       </div><br>
       <div class="input-group">
            <span class="input-group-addon">Starttime:</span>
            <input type="time" class="form-control" style="width:600px;height:30px" name="starttime">
       </div>
       <div class="input-group">
            <span class="input-group-addon">Endtime:</span>
            <input type="time" class="form-control" style="width:605px;height:30px" name="endtime"><br>
       </div>
       <div class="input-group">
            <span class="input-group-addon">Repetition frequency:</span>
            <input type="text" class="form-control" style="width:527px;height:30px" name="repetition">
        </div>
        <div class="input-group">
            <span class="input-group-addon">State</span>
            <input type="text" class="form-control" style="width:628px;height:30px" name="state">
        </div>
      </div>

   

<div style="padding: 30px 300px 200px;">
   <div class="row">
       <div class="center-block">  
     
         <button type="submit" class="btn btn-default" name="submite" value="submit">
        Submit</button>
    
       </div>
    </div>
  </div>
</form>
<!-- jQuery (Bootstrap 插件需要引入) -->
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<!-- 包含了所有编译插件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</body>
</html>
 
