<?php

namespace App\Controller;

use Core\Controller\Controller;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Comment');
    }

    public function index() {
        $posts = $this->Post->last();
        $comments = $this->Comment->last();
        $this->render('posts.index', compact('posts', 'comments'));
    }

    public function single() {
        $post = $this->Post->find($_GET['id']);
        $comments = $this->Comment->lastByStory($_GET['id']);
        $this->render('posts.single', compact('post', 'comments'));
    }
}