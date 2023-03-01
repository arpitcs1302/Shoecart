<?php

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];
$time = date("Y-m-d h:i:sa");


$host = "localhost";
$dbname = "newweb";
$username = "root";
$password = "";


$conn = new mysqli($host, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);

if(mysqli_connect_errno()){
    die("Connection Error: ".mysqli_connect_errno());
}

$sql = "INSERT INTO contactus(Name, Email, PhoneNumber, message, time) values(?,?,?,?,?)";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
	die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt,"ssiss",$name,$email,$number,$message,$time);

mysqli_stmt_execute($stmt);

header("location: contact.html");


?>
