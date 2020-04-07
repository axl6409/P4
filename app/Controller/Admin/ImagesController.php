<?php


namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\HTML\Upload;

class ImagesController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Image');
    }

    public function index() {
        $images = $this->Image->all();
        $this->render('admin.images.index', compact('images'));
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

    public function edit() {

        $image = $this->Image->find($_GET['id']);
        $form = new BootstrapForm($image);
        /*
        $filename = $image->name;
        $oldWithoutExt = pathinfo($filename, PATHINFO_FILENAME);

        if (!empty($_POST)) {

            $old = ROOT . "/public/img/" . $oldWithoutExt;
            $new = pathinfo($_POST['name'], PATHINFO_FILENAME);

            rename($old, $new);

           $result = $this->Image->update($_GET['id'], [
              'name'    => $_POST['name']
           ]);

           if ($result) {
               return $this->index();
           }

        }
        */

        $this->render('admin.images.edit', compact( 'form'));
    }

    public function delete() {

        if (!empty($_POST)) {
            $result = $this->Image->delete($_POST['id']);
            $delete = unlink('public/img/' . $_POST['name']);
            header('Location: index.php?p=admin.images.index');
        }

    }

}
