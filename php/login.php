<?php
if(isset($_POST["login-btn"])){
    require("db.php");
    $mail=$_POST["email"];
    $pass=$_POST["pwd"];
        if (empty($mail)||empty($pass)) {
            header('location:index.html?emptyfields');
            exit();
        }else {        
            $sql="SELECT email, pwd FROM users WHERE email='$mail'";
            $result=mysqli_query($conn,$sql);
            if (mysqli_num_rows($result)>0) {
                while ($row=mysqli_fetch_assoc($result)) {
                        if ($pass == $row['pwd']) {
                            // echo $row['email'];
                            // echo $row['pwd'];
                            session_start();
                            $_SESSION['email'] = $mail;
                            header('location: dashboard.php?loginsuccess');
                            exit();
                        }else {
                            // echo "not today";
                            header('location: ../index.html?wrongCredentials');
                            exit();
                        }
                }
            }else {
                header('location:../index.html?emailDoesNotExist');
            exit();
            }
        }
}else {
        header('location: index.html?goComeLegally');
        exit();
}



