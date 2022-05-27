<?php
if(isset($_POST["upload-btn"])){

    $file=$_FILES['file'];
    
    $fileName=$file['name'];
    $fileType=$file['type'];
    $fileError=$file['error'];
    $fileTmpName=$file['tmp_name'];
    $fileSize= $file['size'];

    $fileExt=strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
    $allowedExt = array('jpg','jpeg','png');
    $fileDestination="uploads/".basename($fileName);
    
    
    if ($fileError === 1 ) {
        echo "There was an error uploading this image!";
    }else {
        if ($fileSize < 5000000) {
            if (!in_array($fileExt,$allowedExt)) {
                echo'Only jpg, jpeg, and png files are allowed.';
            }else {
                $sql="INSERT INTO users(profileimage) VALUES ('$fileName')";
                mysqli_query($conn,$sql)
                move_uploaded_file($fileTmpName, $fileDestination );
                header("Location: index.php?upload=success");
            }
        }else {
            echo "file is bigger than 5mb!";
        }  
}