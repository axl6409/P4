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

        $form = new BootstrapForm($_POST);

        if (!empty($_POST) && !empty($_FILES['image'])) {

            $upload = new Upload();
            $start = $upload->startUpload();

            if ($upload->uploadOk == false) {

                $this->render('admin.posts.edit', compact( 'form', 'start'));
                return $start;

            } else {

                $result = $this->Post->create([
                    'title'     => $_POST['title'],
                    'content'   => $_POST['content'],
                    'image'     => $_FILES['image']['name']
                ]);

                if ($result) {

                    return $this->index();
                }

            }

        } elseif (!empty($_POST)) {

            $result = $this->Post->create([
                'title'     => $_POST['title'],
                'content'   => $_POST['content']
            ]);

            if ($result) {

                return $this->index();
            }

        }

        $this->render('admin.posts.edit', compact( 'form'));

    }

    public function edit() {

        $post = $this->Post->find($_GET['id']);
        $form = new BootstrapForm($post);

        if (!empty($_POST) && !empty($_FILES['image'])) {

            $upload = new Upload();
            $start = $upload->startUpload();

            if ($upload->uploadOk == false) {

                $this->render('admin.posts.edit', compact( 'form', 'start'));
                return $start;

            } else {

                $result = $this->Post->update($_GET['id'], [
                    'title'     => $_POST['title'],
                    'content'   => $_POST['content'],
                    'image'     => $_FILES['image']['name']
                ]);

                if ($result) {

                    return $this->index();
                }

            }

        } elseif (!empty($_POST)) {

            $result = $this->Post->update($_GET['id'], [
                'title'     => $_POST['title'],
                'content'   => $_POST['content']
            ]);

            if ($result) {

                return $this->index();
            }

        }

        $this->render('admin.posts.edit', compact( 'post','form'));

    }

    public function delete() {

        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            header('Location: index.php?p=admin.posts.index');
        }

    }

}
