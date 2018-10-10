<?php
include_once('image.php');

if(isset($_POST["submit"])) {

    $target_dir = "uploads/";
    $errors= array();

    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){

        $strFileName = $_FILES['files']['name'][$key];
        $liFileSize =$_FILES['files']['size'][$key];
        $strFileTmp =$_FILES['files']['tmp_name'][$key];
        $strTargetFile = $target_dir . basename($_FILES["files"]["name"][$key]);
        $strFileType=strtolower(pathinfo($strTargetFile,PATHINFO_EXTENSION));
 
        $image = new CImage($strFileName, $strFileType, $liFileSize, $strFileTmp, $strTargetFile);
     
        $image->upload();
    }
}

header('Location: galery.php');
exit;
?>