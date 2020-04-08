<?php


namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\HTML\Upload;

class OptionsController extends AppController {

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Option');
        $this->loadModel('Image');
    }

    public function index() {
        $options = $this->Option->all();
        $this->render('admin.options.index', compact('options'));
    }

    public function edit() {

        $option = $this->Option->find($_GET['id']);
        $form = new BootstrapForm($option);
        $upload = new Upload();

        if ($_GET['id'] == 1) {

            if (isset($_POST)) {

                if (!empty($_FILES)) {

                    if ($_FILES['value']['error'] === 4) {

                        $error = "<p>Aucune image n'as été ajoutée</p>";
                        $this->render('admin.options.edit', compact('option', 'form', 'error'));
                        return $error;

                    } elseif ($_FILES['value']['error'] === 0) {

                        $start = $upload->startUpload('options');

                        if ($upload->uploadOk === false) {

                            $this->render('admin.options.edit', compact('option', 'form', 'start'));
                            return $start;

                        } elseif ($upload->uploadOk === true) {

                            $result = $this->Option->update($_GET['id'], [
                                'value' => $_FILES['value']['name']
                            ]);

                            if ($result) {
                                return $this->index();
                            }
                        }
                    }
                }
            }

        } else {

            $result = $this->Option->update($_GET['id'], [
                'value'     => $_POST['value']
            ]);

            if ($result) {
                return $this->index();
            }

        }

        $this->render('admin.options.edit', compact( 'option','form'));
    }

}
