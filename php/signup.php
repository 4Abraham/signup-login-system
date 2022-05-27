<?php
require 'db.php';
if(isset($_POST['signup_btn'])){
    $username=$_POST["username"];
    $mail=$_POST["mail"];
    $pass=$_POST["pwd"];
    $rptpass=$_POST["rpwd"];


                if(empty($username)||empty($mail)||empty($pass)||empty($rptpass)){
                    echo "<script>alert('empty fields')</script>";
                    // header("Location:index.html");
                    exit();
                }else if (!filter_var($mail,FILTER_VALIDATE_EMAIL)) {
                    echo "<script>alert('invalid email')</script>";
                    // header("Location:index.html");
                    exit();
                }else if (!preg_match("/^[a-z A-Z 0-9]*$/",$username)) {
                    echo "<script>alert('invalid username')</script>";
                    // header("Location:index.html");
                    exit();
                }else if ($pass !==$rptpass) {
                    echo "<script>alert('wrong credintials')</script>";
                    // header("Location:index.html");
                    exit();
                }else {
                    $sql="INSERT INTO users(username,email,pwd,status,profileimage) VALUES('$username','$mail','$pass',0,'' )";
                    if (mysqli_query($conn,$sql)) {
                    echo "<script>alert('registered successfully')</script>";
                    }else {
                        echo "<script>alert('registered unsuccessful')</script>";
                    }
                }
}else {
    echo "<script>alert('go signup')</script>";
}
