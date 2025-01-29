<?php
$servername="localhost";
$username="root";
$password="";
$database="freshfood";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("connection is failed..");
}
?>