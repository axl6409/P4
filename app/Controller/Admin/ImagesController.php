<?php


namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\HTML\Upload;

class ImagesController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('PostsImage');
        $this->loadModel('OptionsImage');
    }

    public function index() {
        $postsImages = $this->PostsImage->all();
        $optionsImages = $this->OptionsImage->all();
        $this->render('admin.images.index', compact('postsImages', 'optionsImages'));
    }

    public function add() {

        $error = false;
        $form = new BootstrapForm($_POST);
        $upload = new Upload();

        if (!empty($_FILES)) {

            if ($_FILES['image']['error'] === 4) {

                $error = "Aucune image n'as été insérée";
                $this->render('admin.images.add', compact( 'form', 'error'));
                return $error;

            } elseif ($_FILES['image']['error'] === 0) {

                $start = $upload->startUpload();

                if ($upload->uploadOk === false) {

                    $this->render('admin.images.add', compact( 'form','error', 'start'));
                    return $start;

                } elseif ($upload->uploadOk === true) {

                    $result = $this->Image->create([
                        'name'     => $_FILES['image']['name']
                    ]);

                    if ($result) {
                        return $this->index();
                    }

                }

            }

        }

        $this->render('admin.images.add', compact( 'form', 'error'));
    }


    public function delete() {

        if (!empty($_POST)) {
            $result = $this->Image->delete($_POST['id']);
            $delete = unlink('public/img/' . $_POST['name']);
            header('Location: index.php?p=admin.images.index');
        }

    }

}
