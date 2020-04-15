<?php

namespace App\Controller;
use \DateTime;
use \DateTimeZone;
use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Comment');
        $this->loadModel('User');
        $this->loadModel('PostsImage');
        $this->loadModel('Option');
        $this->loadModel('OptionsImage');
    }

    public function index() {
        $posts = $this->Post->last();
        $options = $this->Option->all();
        $optionImage = $this->OptionsImage->find($options[10]->value);
        $this->render('posts.index', compact('posts',  'options', 'optionImage'));

    }

    public function single() {
        $date = new DateTime(null, new DateTimeZone('Europe/Paris'));
        $post = $this->Post->find($_GET['id']);
        $comments = $this->Comment->lastByStory($_GET['id']);
        $postImage = $this->PostsImage->find($post->image_id);
        $form = new BootstrapForm($_POST);

        if (!empty($_POST['content'])) {
            $this->Comment->newComment($_POST['content'], $_SESSION['auth'], $_GET['id'], '2', $date->format('Y-m-d H:i:s'));
            return $this->index();
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
