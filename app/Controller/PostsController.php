<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class PostsController extends AppController {


    public function index() {
        $posts = App::getInstance()->getTable('Post')->last();
        $comments = App::getInstance()->getTable('Comment')->all();
        $this->render('posts.index', compact('posts', 'comments'));
    }

    public function show() {

    }
}