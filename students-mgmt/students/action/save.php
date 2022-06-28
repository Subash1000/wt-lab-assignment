<?php
require_once "../../utils/db.php";

$name=$_POST['username'];
$email=$_POST['email'];
$password= password_hash ($_POST['password'],PASSWORD_DEFAULT);
$dob=$_POST['dob'];
$favorite_color=$_POST['color'];
$weight=$_POST['weight'];
$gender=$_POST['gender'];
$hobbies = implode(",", $_POST['hobbies'] ?? []);
$nationality=$_POST['nationality'];
$sql = "INSERT INTO students (name,email,password,dob,favorite_color,weight,gender,hobbies,nationality)
 VALUES ('$name','$email','$password','$dob','$favorite_color',$weight,'$gender','$hobbies','$nationality') ";
 die($sql);

 if ($conn -> query($sql) == TRUE){
   header("location:../?success=success");
 }else{
   header("location:../?error=error");
 }
//     die("success");
//  }else{
//     die("error");

// var_dump
//  die("save");
?>