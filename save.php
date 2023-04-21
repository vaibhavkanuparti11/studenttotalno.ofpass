<?php
session_start();
include 'dbconnection.php';
$id=$_POST['id'];
$name=$_POST['name'];
$telugu=$_POST['telugu'];
$hindi=$_POST['hindi'];
$english=$_POST['english'];
$maths=$_POST['maths'];
$social=$_POST['social'];
$sql=mysqli_query($conn,"INSERT INTO `sturesult`(`name`, `telugu`,`hindi`,`english`,`maths`,`social`) 
VALUES ('$name','$telugu','$hindi','$english','$maths','$social')");
print_r($sql);
if($sql){
    header('Location:../student');
    echo "insert";
}else{
    echo "not";
}