<?php


namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\HTML\Upload;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Image');
    }

    public function index() {
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));
    }

    public function add() {

        $form = new BootstrapForm($_POST);
        $upload = new Upload();
        $images = $this->Image->extract('id','name');

        if (!empty($_POST)) {

            if (!empty($_FILES)) {

                if ($_FILES['image']['error'] === 4) {

                    if (!empty($_POST['image_slct'])) {

                        $resultPost = $this->Post->create([
                            'title'         => $_POST['title'],
                            'content'       => $_POST['content'],
                            'image_id'      => $_POST['image_slct']
                        ]);

                        if ($resultPost) {
                            return $this->index();
                        }

                    } else {

                        $resultPost = $this->Post->create([
                            'title'         => $_POST['title'],
                            'content'       => $_POST['content']
                        ]);

                        if ($resultPost) {
                            return $this->index();
                        }

                    }

                } elseif ($_FILES['image']['error'] === 0) {

                    $start = $upload->startUpload();

                    if ($upload->uploadOk === false) {

                        $this->render('admin.posts.edit', compact( 'form', 'images', 'start'));
                        return $start;

                    } elseif ($upload->uploadOk === true) {

                        $resultImage = $this->Image->create([
                            'name'     => $_FILES['image']['name']
                        ]);

                        $imageId = $this->Image->findByName($_FILES['image']['name']);

                        $resultPost = $this->Post->create([
                            'title'         => $_POST['title'],
                            'content'       => $_POST['content'],
                            'image_id'      => $imageId->id
                        ]);

                        if ($resultImage && $resultPost) {
                            return $this->index();
                        }

                    }
                }
            }
        }

        $this->render('admin.posts.edit', compact( 'form', 'images'));
    }

    public function edit() {

        $post = $this->Post->find($_GET['id']);
        $images = $this->Image->extract('id','name');
        $form = new BootstrapForm($post);
        $upload = new Upload();

        if (!empty($_POST)) {

            if (!empty($_FILES)) {

                if ($_FILES['image']['error'] === 4) {

                    if (!empty($_POST['image_slct'])) {

                        $resultPost = $this->Post->update($_GET['id'], [
                            'title'         => $_POST['title'],
                            'content'       => $_POST['content'],
                            'image_id'      => $_POST['image_slct']
                        ]);

                        if ($resultPost) {
                            return $this->index();
                        }

                    } else {

                        $resultPost = $this->Post->update($_GET['id'], [
                            'title'         => $_POST['title'],
                            'content'       => $_POST['content']
                        ]);

                        if ($resultPost) {
                            return $this->index();
                        }

                    }

                } elseif ($_FILES['image']['error'] === 0) {

                    $start = $upload->startUpload();

                    if ($upload->uploadOk === false) {

                        $this->render('admin.posts.edit', compact( 'post','form', 'images','start'));
                        return $start;

                    } elseif ($upload->uploadOk === true) {

                        $resultImage = $this->Image->create([
                            'name'     => $_FILES['image']['name']
                        ]);

                        $imageId = $this->Image->findByName($_FILES['image']['name']);

                        $resultPost = $this->Post->update($_GET['id'], [
                            'title'         => $_POST['title'],
                            'content'       => $_POST['content'],
                            'image_id'      => $imageId->id
                        ]);

                        if ($resultImage && $resultPost) {
                            return $this->index();
                        }

                    }
                }
            }

        }

        $this->render('admin.posts.edit', compact( 'post','form', 'images'));

    }

    public function delete() {

        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            header('Location: index.php?p=admin.posts.index');
        }

    }

}
