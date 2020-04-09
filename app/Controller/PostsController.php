<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Comment');
        $this->loadModel('User');
        $this->loadModel('Image');
        $this->loadModel('Option');
    }

    public function index() {
        $posts = $this->Post->last();
        $comments = $this->Comment->last();
        $options = $this->Option->all();
        $optionImage = $this->Image->find($options[3]->value);
        foreach ($posts as $post) {
            $postImage = $this->Image->find($post->image_id);
        }

        $this->render('posts.index', compact('posts', 'comments', 'postImage', 'options','optionImage'));
    }

    public function single() {

        $post = $this->Post->find($_GET['id']);
        $comments = $this->Comment->lastByStory($_GET['id']);
        $postImage = $this->Image->find($post->image_id);
        $form = new BootstrapForm($_POST);

        if (!empty($_POST['content'])) {
            $this->Comment->newComment($_POST['content'], $_SESSION['auth'], $_GET['id'], '2');
            unset($_POST);
            return $this->single();
        }
        $this->render('posts.single', compact('post', 'comments', 'form', 'postImage'));
    }

    public function signal() {
        if (!empty($_POST)) {
            $result = $this->Comment->update($_POST['id'], [
                'alert_id'     => '1'
            ]);

            if ($result) {
                return $this->index();
            }
        }
    }


}
