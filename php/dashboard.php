<?php
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=" ../css/style.css">
        <title>new dashboard</title>
    </head>
    <body>
        <div class="form-container">
            <form action="upload.php" method="post" enctype="multipart/form-data" id="profileForm">
                <div class="imgContainer">
                    <?php
                    
                        require("db.php");
                        $sql="SELECT username, status,profileimage FROM users WHERE email = '$email'";
                        $result=mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {
                                
                                if (!$row['status']== 1) {
                                    echo "<img src='../img/defaultProfile.png'>";
                                }else {
                                    
                                    $sqlImg= "UPDATE users SET status= 1 WHERE email='$mail'";
                                    $resultImg=mysqli_query($conn,$sql);
                                    if (mysqli_num_rows($result)>0) {
                                        while ($rowImg=mysqli_fetch_assoc($resultImg)) {
                                            echo "<img src='../uploads/$row[profileimage]'>";
                                        }
                                    }
                                }
                                echo $row['username'];
                            }
                        }
                    ?>
                        <div class="roundIcon">
                            <img src="../img/camera.png">
                            <input type="file" name="upload-btn" id="image">
                        </div>
                </div>         
            </form>
            <form action="logout.php" method="post">
                <ul>
                <li>  <button type="submit" name="logout-btn">logout</button></li>
                </ul>
            </form>
        </div>
        <script src="js/main.js"></script>
    </body>
    </html>

<?php

}else{
    echo "Not Logged In";
}

?>

