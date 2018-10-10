<?php 
class Image {

    private $fileName;
    private $fileType;
    private $fileSize;
    private $fileTmp;
    private $targetFile;    
    private $fileTypes = array("jpg", "png", "jpeg", "gif");
    private $targetDir = "uploads/";

    const MAXFILESIZE = 500000;

    public function __construct($fileName, $fileType, $fileSize, $fileTmp, $targetFile) {
        $this->fileName = $fileName;
        $this->fileType = $fileType;
        $this->fileSize = $fileSize;
        $this->fileTmp = $fileTmp;
        $this->targetFile = $targetFile;
    }

    public function upload() {
        if(!$this->isCorrectFileType($this->fileType)) {
            die("Sorry, only JPG, JPEG, PNG & GIF files are allowed. <a href='galery.php'>Upload again</a>");
        } else {
            if(!$this->checkFileSize($this->fileSize)) {
                die("File size must be less than 5 MB. <a href='galery.php'>Upload again</a>");
            }
            else {
                $timeFileName=time().$this->fileName;

                if (!move_uploaded_file($this->fileTmp, $this->targetDir.$timeFileName)) {
                    die($this->fileName."is not uploaded. <a href='galery.php'>Upload again</a>");
                }
            }

        }
    }

    private function isCorrectFileType($fileType) {
        $temp = 0;
        foreach ($this->fileTypes as $key => $value) {
            if($value == $fileType) {
                 $temp = 1;
                 break;
            }
        }
        if($temp == 0) {
            return false;
        }
        return true;
    }

    private function checkFileSize($fileSize) {
        if($fileSize > self::MAXFILESIZE){
            return false;
        }
        return true;
    }

}

?>