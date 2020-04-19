<?php


namespace Core\HTML;

/**
 * Class Upload
 * @package Core\HTML
 */
class Upload {


    private $target_dir = ROOT ."/public/img/";
    private $altern_dir = ROOT ."/public/assets/";
    private $target_file;
    private $fileName;
    private $fileTmp;
    private $fileSize;
    private $maxSize = 500000;
    public $uploadOk = true;
    private $imageFileType;
    private $fileErrors;

    /**
     * Main method, start the upload and call the others
     * @param array $target
     * @return string
     */
    public function startUpload($target = []) {


        if ($target === 'options') {
            $this->fileName = $_FILES["value"]["name"];
            $this->target_file = $this->altern_dir . basename($this->fileName);
            $this->fileSize = $_FILES["value"]["size"];
            $this->fileTmp = $_FILES["value"]["tmp_name"];
            $this->fileErrors = $_FILES['value']['error'];
        } else {
            $this->fileName = $_FILES["image"]["name"];
            $this->target_file = $this->target_dir . basename($this->fileName);
            $this->fileSize = $_FILES["image"]["size"];
            $this->fileTmp = $_FILES["image"]["tmp_name"];
            $this->fileErrors = $_FILES['image']['error'];
        }

        if (!$this->checkType()) {

            $html = '<p>Only JPG, JPEG, PNG & GIF files are allowed !</p>';
            return $this->result($html);

        }

        if ($this->fileErrors === 1) {

            $html = '<p>Your file is too large ! max of 500ko</p>';
            return $html;

        }

        if (!$this->checkSize()) {

            $html = '<p>Your file is too large ! Max 500Ko</p>';
            return $this->result($html);

        }

        if (!$this->checkExists()) {

            $html = '<p>File already exists !</p>';
            return $this->result($html);

        }

        if ($this->uploadOk == false) {

            $html = '<p>File was not upload</p>';
            return $this->result($html);

        } else {
            move_uploaded_file($this->fileTmp, $this->target_file);
            $html = '<p>File '. basename($this->fileName) .' has been uploaded !</p>';
            return $this->result($html);

        }

    }

    /**
     * Check the type of the image
     * @return bool
     */
    protected function checkType() {
        $this->imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
        if ($this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg" && $this->imageFileType != "gif") {
            $this->uploadOk = false;
            return false;
        } else {
            $this->uploadOk = true;
            return true;
        }

    }

    /**
     * Check the size of the image
     * @return bool
     */
    protected function checkSize() {
        if ($this->fileSize > $this->maxSize) {
            $this->uploadOk = false;
            return false;
        } elseif ($this->fileSize <= $this->maxSize) {
            $this->uploadOk = true;
            return true;
        }
    }

    /*
     * Check if the image already exists
     */
    protected function checkExists() {
        if (file_exists($this->target_file)) {
            $this->uploadOk = false;
            return false;
        } else {
            $this->uploadOk = true;
            return true;
        }
    }

    /**
     * Render a result message
     * @param $html
     * @return string
     */
    public function result($html) {
        return "<div class=\"submit-message alert alert-danger\">{$html}</div>";
    }
}
