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
        $images = $this->Image->extract('id','name');

        if (!empty($_POST)) {

            $result = $this->Post->create([
                'title'         => $_POST['title'],
                'content'       => $_POST['content'],
                'image_id'      => $_POST['image']
            ]);

            if ($result) {
                return $this->index();
            }

        }

        $this->render('admin.posts.edit', compact( 'form', 'images'));

    }

    public function edit() {

        $post = $this->Post->find($_GET['id']);
        $form = new BootstrapForm($post);
        $images = $this->Image->extract('id','image');

        if (!empty($_POST)) {

            $result = $this->Post->update($_GET['id'], [
                'title'         => $_POST['title'],
                'content'       => $_POST['content'],
                'image_id'      => $_POST['image']
            ]);

            if ($result) {
                return $this->index();
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
