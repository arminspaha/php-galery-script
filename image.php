<?php 
class CImage {

    private $m_strFileName;
    private $m_strFileType;
    private $m_liFileSize;
    private $m_strFileTmp;
    private $m_strTargetFile;    
    private $m_rgstrFileTypes = array("jpg", "png", "jpeg", "gif");
    private $m_strTargetDir = "uploads/";

    const MAXFILESIZE = 500000;

    public function __construct($strFileName, $strFileType, $liFileSize, $strFileTmp, $strTargetFile) {
        $this->m_strFileName = $strFileName;
        $this->m_strFileType = $strFileType;
        $this->m_liFileSize = $iFileSize;
        $this->m_strFileTmp = $strFileTmp;
        $this->m_strTargetFile = $strTargetFile;
    }

    public function upload() {
        if(!$this->isCorrectFileType($this->m_strFileType)) {
            die("Sorry, only JPG, JPEG, PNG & GIF files are allowed. <a href='galery.php'>Upload again</a>");
        } else {
            if($this->checkFileSize($this->m_liFileSize)) {
                die("File size must be less than 5 MB. <a href='galery.php'>Upload again</a>");
            }
            else {
                $m_strTimeFileName=time().$this->m_strFileName;

                if (!move_uploaded_file($this->m_strFileTmp, $this->m_strTargetDir.$m_strTimeFileName)) {
                    die($this->m_strFileName."is not uploaded. <a href='galery.php'>Upload again</a>");
                }
            }

        }
    }

    private function isCorrectFileType($strFileType) {
        $iTemp = 0;
        foreach ($this->m_rgstrFileTypes as $key => $strValue) {
            if($strValue == $strFileType) {
                 $iTemp = 1;
                 break;
            }
        }
        if($iTemp == 0) {
            return false;
        }
        return true;
    }

    private function checkFileSize($liFileSize) {
        return $liFileSize > self::MAXFILESIZE
    }

}

?>
