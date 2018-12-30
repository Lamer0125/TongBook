<!DOCTYPE html>
<html>
<head>
	<style>
.error {color: #FF0000;}
</style>
	<title>Register</title>
</head>
<?php
// 定义变量并设置为空值
/*
$nameErr = $emailErr = $passwordErr = $confirmedErr = $stateErr = "";
$name = $email = $password = $confirmed = $state= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name cannot be empty!";
   } else {
     $name = test_input($_POST["name"]);
     // 检查姓名是否包含字母和空白字符
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters are limited!"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email cannot be empty!";
   } else {
     $email = test_input($_POST["email"]);
     // 检查电子邮件地址语法是否有效
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
       $emailErr = "Email is in "; 
     }
   }
     
  if (empty($_POST["password"])) {
     $passwordErr = "Password cannot be empty!";
   }else{
   	$password=$_POST["password"];
   }

   if (empty($_POST["confirmed"])) {
     $confirmedErr = "Confirmed password cannot be empty!";
   }
   else if($_POST["password"]!=$_POST["confirmed"]){
   	 $confirmedErr="Confirmed password is not the same with password!";
   }
   if (empty($_POST["state"])) {
     $stateErr = "State cannot be empty!";
   }
   else{
   	 $state=$_POST["state"];
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
*/
?>

<?php 
include("config.php");
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
?>
