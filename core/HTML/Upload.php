<?php


namespace Core\HTML;


class Upload {

    public $src = ROOT . "/public/img/";
    public $tmp;
    public $filename;
    public $type;
    public $uploadFile;
    public $uploadStatus = false;

    public function startUpload() {

        $this->filename = $_FILES["image"]["name"];
        $this->tmp = $_FILES["image"]["tmp_name"];
        $this->uploadFile = $this->src . basename($this->filename);
        $this->checkIfIsImage();
        $this->checkFormat();
        $this->checkFileSize();
        if( $this->uploadStatus === true) {
            $this->uploadFile();
            return true;
        }
    }

    protected function checkIfIsImage() {
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check != false) {
                $error = "File is an image - " . $check["mime"] . ".";
                $this->uploadStatus = true;
                return $error;
            } else {
                $error = "File is not an image";
                $this->uploadStatus = false;
                return $error;
            }
        }
    }

    protected function checkExists() {
        if (file_exists($this->uploadFile)) {
            $error = "Sorry, file already exists";
            $this->uploadStatus = false;
            return $error;
        }
        $this->uploadStatus = true;
    }

    protected function checkFormat() {
        $this->type = strtolower(pathinfo($this->uploadFile, PATHINFO_EXTENSION));
        if ($this->type != "jpg" && $this->type != "jpeg" && $this->type != "png" && $this->type != "gif") {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
            $this->uploadStatus = false;
            return $error;
        }
        $this->uploadStatus = true;
    }

    protected function checkFileSize() {
        if ($_FILES["image"]["size"] > 500000) {
            $error = "Sorry, your file is to large";
            $this->uploadStatus = false;
            return $error;
        }
        $this->uploadStatus = true;
    }

    protected function uploadFile(){

        if ($this->uploadStatus == false) {
            $error = "Sorry, your file was not uploaded";
            return $error;
        } else {
            if (move_uploaded_file($this->src, $this->uploadFile)) {
                $error = "The file ". $this->uploadFile ." has been uploaded";
                return $error;
            } else {
                $error = "Sorry, there was an error uploading your file";
                return $error;
            }
        }
    }
}
