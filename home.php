<?php

$username = $_POST['username'];
$password = $_POST['password'];


$conn = mysqli_connect("localhost","root","","ecommerce");

$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_escape_string($conn,$username);
$password = mysqli_escape_string($conn,$password);


$query_validate = "select * from login where username = '$username' and password = '$password'";
$result = mysqli_query($conn,$query_validate);
$row = mysqli_fetch_array($result);
if ($row['username'] == $username && $row['password'] == $password) 
{
	echo "Login Success!! Welcome ". $row['username'];
}
else
{
	echo "Failed to login";
}
?>
