<?php
session_start();

define('KB', 1024);
define('MB', 1048576); //space you want to give

if (isset($_POST['prof-submit'])) {
    require 'dbhandler.php';

    $uname = $_SESSION['username'];

    $file = $_FILES['prof-image'];
    $file_name = $file['name'];   
    $file_tmp_name = $file['tmp_name'];   
    $file_error = $file['error'];     //this is defined in login helper? name is predefined
    $file_size = $file['size'];

    $bio = $_POST['bio'];

    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $allowed = array('jpg', 'jpeg', 'png', 'svg');

    if($file_error !== 0){ //if error during upload
        header("Location: ../profile.php?error=UploadError");
        exit();
    }

    if(!in_array($ext, $allowed)){      //is file acceptable type
        header("Location: ../profile.php?error=InvalidType");
        exit();
    }
    if($file_size > 4*MB){      //cant upload more than 4m
        header("Location: ../profile.php?error=FileSizeExceeded");
        exit();
    }
    else{
        $new_name = uniqid('',true).".".$ext; //this is new name
        $destination = '../uploads/'.$new_name;

        $sql = "UPDATE profile SET picpath=?, bio=? WHERE uname=?"; //replace 3 of these values ???
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../profile.php?error=SQLInjection");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"sss",$destination, $bio, $uname); //s placeholder
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            move_uploaded_file($file_tmp_name, $destination);
            header("Location: ../profile.php?success=UploadSuccess");
            exit();
        }
    }
}