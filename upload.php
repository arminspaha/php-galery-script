<?php
include_once('image.php');

if(isset($_POST["submit"])) {

    $target_dir = "uploads/";
    $errors= array();

    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){

        $fileName = $_FILES['files']['name'][$key];
        $fileSize =$_FILES['files']['size'][$key];
        $fileTmp =$_FILES['files']['tmp_name'][$key];
        $targetFile = $target_dir . basename($_FILES["files"]["name"][$key]);
        $fileType=strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
 
        $image = new Image($fileName, $fileType, $fileSize, $fileTmp, $targetFile);
     
        $image->upload();
    }
}

header('Location: galery.php');
exit;
?>