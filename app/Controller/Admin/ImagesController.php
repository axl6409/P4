<?php


namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\HTML\Upload;

/**
 * Class ImagesController
 * @package App\Controller\Admin
 */
class ImagesController extends AppController {

    /**
     * ImagesController constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->loadModel('PostsImage');
        $this->loadModel('OptionsImage');
    }

    /**
     * Manage the images page on admin
     * @uses \App\Table\PostsImageTable
     * @uses \App\Table\OptionsImageTable
     */
    public function index() {
        $postsImages = $this->PostsImage->all();
        $optionsImages = $this->OptionsImage->all();
        $this->render('admin.images.index', compact('postsImages', 'optionsImages'));
    }

    /**
     * Add a new Image
     * @uses \Core\HTML\BootstrapForm
     * @uses \Core\HTML\Upload
     * @return bool|string|void
     */
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

    /**
     * Let the admin to delete an Image link on the options
     * Delete the image in DB & in server folder (assets)
     * @uses \App\Table\OptionsImageTable
     */
    public function delOption() {

        if (!empty($_POST)) {
            $result = $this->OptionsImage->delete($_POST['id']);
            $delete = unlink('public/assets/' . $_POST['name']);
            header('Location: index.php?p=admin.images.index');
        }

    }

    /**
     * Let the Admin to delete an Image link on the posts
     * Delete the image in DB & in server folder (img)
     * @uses \App\Table\PostsImageTable
     */
    public function delPost() {

        if (!empty($_POST)) {
            $result = $this->PostsImage->delete($_POST['id']);
            $delete = unlink('public/img/' . $_POST['name']);
            header('Location: index.php?p=admin.images.index');
        }

    }

}
