<?php


namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\HTML\Upload;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
    }

    public function index() {
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));
    }

    public function add() {

        if (!empty($_POST)) {

            if (isset($_FILES["image"])) {
                $file = new Upload();
                if ($file->startUpload()) {
                    echo "File uploaded";
                }
            }

            $result = $this->Post->create([
                'title'     => $_POST['title'],
                'content'   => $_POST['content']
            ]);

            if ($result) {
                header('Location: index.php?p=admin.posts.index');
            }
        }

        $form = new BootstrapForm();
        $this->render('admin.posts.edit', compact( 'form'));
    }

    public function edit() {

        if (!empty($_POST)) {
            $result = $this->Post->update($_GET['id'], [
                'title'     => $_POST['title'],
                'image'     => $_FILES['image']['name'],
                'content'   => $_POST['content']
            ]);

            if ($result) {
                header('Location: index.php?p=admin.posts.index');
            }
        }

        $post = $this->Post->find($_GET['id']);
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('post', 'form'));
    }

    public function delete() {

        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            header('Location: index.php?p=admin.posts.index');
        }

    }

}
