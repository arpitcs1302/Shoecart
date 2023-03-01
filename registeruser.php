<?php

$name = $_POST['name'];
$email = $_POST['email'];
$userpass = $_POST['userpass'];


$host = "localhost";
$dbname = "newweb";
$username = "root";
$password = "";


$conn = new mysqli($host, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);

if(mysqli_connect_errno()){
    die("Connection Error: ".mysqli_connect_errno());
}

$sql = "INSERT INTO users(Name, Email, userpass) values(?,?,?)";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
	die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt,"sss",$name,$email,,$userpass);

mysqli_stmt_execute($stmt);

header("location: login.html");
?>
