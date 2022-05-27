<?php
$dbservername="localhost";
$dbusername="root";
$password="";
$dbname="newLogin";

$conn = mysqli_connect($dbservername,$dbusername,$password,$dbname);

if (!$conn){
    echo"<script>alert('error in db')</script>";
    exit();
}
?>