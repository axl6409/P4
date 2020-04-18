<?php


namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\HTML\Upload;

/**
 * Class OptionsController
 * @package App\Controller\Admin
 */
class OptionsController extends AppController {

    /**
     * OptionsController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Option');
        $this->loadModel('OptionsImage');
    }

    /**
     * 
     */
    public function index() {
        $options = $this->Option->all();
        $this->render('admin.options.index', compact('options'));
    }

    public function edit() {

        $option = $this->Option->find($_GET['id']);
        $form = new BootstrapForm($option);
        $images = $this->OptionsImage->extract('id','name');
        $postImage = $this->OptionsImage->find($option->value);
        $upload = new Upload();

        if ($option->type == 3) {

            if (isset($_POST)) {

                if (!empty($_FILES)) {

                    if ($_FILES['value']['error'] === 4) {

                        if (!empty($_POST['name'])) {
                            $resultPost = $this->Option->update($_GET['id'], [
                               'value'      => $_POST['name']
                            ]);

                            if ($resultPost) {
                                return $this->index();
                            }
                        } else {

                            $error = "<p>Aucune image n'as été ajoutée</p>";
                            $this->render('admin.options.edit', compact('option', 'form','images', 'postImage','error'));
                            return $error;
                        }

                    } elseif ($_FILES['value']['error'] === 0) {

                        $start = $upload->startUpload('options');

                        if ($upload->uploadOk === false) {

                            $this->render('admin.options.edit', compact('option', 'form', 'images','postImage','start'));
                            return $start;

                        } elseif ($upload->uploadOk === true) {

                            $resultImage = $this->OptionsImage->create([
                                'name'     => $_FILES['value']['name']
                            ]);

                            $imageId = $this->OptionsImage->findByName($_FILES['value']['name']);

                            $resultPost = $this->Option->update($_GET['id'], [
                                'value'      => $imageId->id
                            ]);

                            if ($resultImage && $resultPost) {
                                return $this->index();
                            }
                        }
                    }
                }
            }

        } else {

            if (!empty($_POST)) {
                $result = $this->Option->update($_GET['id'], [
                    'value'     => $_POST['value']
                ]);

                if ($result) {
                    return $this->index();
                }
            }
        }

        $this->render('admin.options.edit', compact( 'option','form','images','postImage'));
    }

}
