<?php

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity {

    public function getUrl() {
        return 'index.php?p=posts.single&id=' . $this->id;
    }

    public function getExcerpt() {
        $html = '<p>' . substr($this->content, 0, 150) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
        return $html;
    }

    public function upload() {

        $target_dir = ROOT ."/public/img/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                $html = "<p class='submit-message'>File is an image - " . $check["mime"] . " .</p>";
                echo $html;
                $uploadOk = 1;
            } else {
                $html = "<p class='submit-message'>File is not an image !</p>";
                echo $html;
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
            $html = "<p class='submit-message'>File already exists</p>";
            echo $html;
        }
        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            $html = "<p class='submit-message'>File is to large</p>";
            echo $html;
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $html = "<p class='submit-message'>Only JPG, JPEG, GIF & PNG files are allowed !</p>";
            echo $html;
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $html = "<p class='submit-message'>File was not upload</p>";
            echo $html;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $html = "<p class='submit-message'>The file ". basename( $_FILES['image']['name'] ) ." as been uploaded.</p>";
                echo $html;
            } else {
                $html = "<p class='submit-message'>There was an error uploading your file</p>";
                echo $html;
            }
        }
    }

}
