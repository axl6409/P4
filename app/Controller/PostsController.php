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
        $comments = $this->Comment->all();
        $this->render('posts.index', compact('posts', 'comments'));
    }

    public function show() {

    }
}