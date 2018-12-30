<?php
	include('session.php');
	include ('config.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
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
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Post</title>
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
    <h1>Post notes 
        <small>&nbsp;&nbsp; Post what you like!</small>
    </h1>
</div>
 <form action="" role="form" class="bs-example bs-example-form" method="post">
        <div class="form-group">
          <label for="name">Content</label>
      <textarea class="form-control" name="text" rows="3"></textarea>
        </div>

 	<!-- <div class="center-block">
 	Tags：
 	</div> -->
 	<!-- <div style="padding: 10px 10px 10px;"> -->
		<div class="row">
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


     <div style="padding: 30px 30px;">
       <div class="input-group">
            <span class="input-group-addon">Location:</span>
            <input type="number" class="form-control" style="width:300px;height:30px" name="latitude">
            <input type="number" class="form-control" style="width:300px;height:30px" name="longitude"><br>
       
       </div><br>
       <div class="input-group">
             <span class="input-group-addon">Visible range:</span>
            <input type="text" class="form-control" style="width:572px;height:30px" name="radius"><br>
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
      </div>

     <div class="row">
        <div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon">
					Visible to:&nbsp;&nbsp;&nbsp;
						<input type="radio" name="view" value="all">All&nbsp;
						<input type="radio" name="view" value="friend">Friend&nbsp;
						<input type="radio" name="view" value="me">Me&nbsp;
					</span>
					</div>
				</div><!-- /input-group -->
			</div><!-- /.col-lg-6 -->
	

<div style="padding: 30px 300px 200px;">
   <div class="row">
       <div class="center-block">  
     
         <button type="submit" class="btn btn-default">Submit</button>
    
       </div>
    </div>
  </div>
</form>
 		<!-- Tourism<input type="checkbox" name="tag[]" value="Tourism"><br>
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
 	-->
 <!-- jQuery (Bootstrap 插件需要引入) -->
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<!-- 包含了所有编译插件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</body>
</html>
