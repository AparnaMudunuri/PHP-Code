<?php

session_start();
error_reporting(0);

//initialising variables

$username = $_POST['username'];
$email = $_POST['email'];
$password_1 = $_POST['password_1'];
$password_2 = $_POST['password_2'];

$errors = array();


//creating connection to the database

$conn = mysqli_connect("localhost","root","","ecommerce") or die("couldn't connect to the database");



$username = mysqli_real_escape_string($conn,$username);
$email = mysqli_real_escape_string($conn,$email);
$password_1 = mysqli_real_escape_string($conn,$password_1);
$password_2 = mysqli_real_escape_string($conn,$password_2 );


if(empty($username))
{
  array_push($errors,"Username should not be blank");
  echo "Username should not be blank";
}

if(empty($email))
{
  array_push($errors,"e-mail id should not be blank");
  echo "e-mail id should not be blank";
}
if(empty($password_1))
{
  array_push($errors,"Password should not be blank");
  echo "Password should not be blank";
}
if($password_1 != $password_2)
{
  array_push($errors,"Password didn't match");
  echo "Password didn't match";
}
if(strlen($password_1) < 8)
{
  array_push($errors,"Password must be greater than 8");
  echo "Password must be greater than 8 characters";
}


$user_check_query = "SELECT * FROM login WHERE username = '$username' or email = '$email' LIMIT 1";

$results = mysqli_query($conn,$user_check_query);
$user = mysqli_fetch_assoc($results);

if($user['username'] === $username)
{
  array_push($errors,"User already exists");
  echo "User already exists";
}
if ($user['email'] === $email)
{
  array_push($errors,"Email already exists");
  echo "e-mail already exists";
}


if(count($errors) === 0)
{
    

    $register_query = "INSERT INTO login (username,email,password) VALUES ('$username','$email','$password_1')";

    mysqli_query($conn,$register_query);
    
}
?>