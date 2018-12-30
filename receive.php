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
    <h1>Receive
        <small>&nbsp;&nbsp; Friends requests</small>
    </h1>

</div>
<!-- jQuery (Bootstrap 插件需要引入) -->
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<!-- 包含了所有编译插件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</body>
</html>
<?php
include("config.php");
include("session.php");
$uid=$loginid_session;
//$sql="select uid1,uname from friendsrequest,users where uid2='{$uid}' and uid1=uid";
$sql="select uid1,uname from friendsrequest,users where uid2=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("s",$uid);
$stmt->execute();
$res1=array();
$res2=array();
if($result=$stmt->get_result()){
    if(mysqli_num_rows($result)!=0){
        while ($row=mysqli_fetch_array($result)) {
            $res1[]=$row['uname'];
            $res2[]=$row['uid1'];
        }
        //echo count($res2);
    }
    else{
        echo "There is no invitations!";
    }
}
else{
    echo "Error";
}
for($i=0;$i<count($res1);$i++){
    echo $res1[$i]."  wants to make friends with you.".'<form method="post">
	                                      <input type="submit" name='.$res2[$i].' value="Accept"> </form>';
}
for($i=0;$i<count($res2);$i++){
    if(!empty($_POST[$res2[$i]])){
        $sql="update friendsrequest set status=1 where uid2='$uid' and uid1='$res2[$i]'";
        if(mysqli_query($conn,$sql)==true)
            echo $res1[$i]."and you are friends now!";
    }
}
?>
