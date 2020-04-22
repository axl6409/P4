<?php

namespace App\Controller;
use \DateTime;
use \DateTimeZone;
use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

/**
 * Class PostsController
 * @package App\Controller
 */
class PostsController extends AppController {

    /**
     * PostsController constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Comment');
        $this->loadModel('User');
        $this->loadModel('PostsImage');
        $this->loadModel('Option');
        $this->loadModel('OptionsImage');
    }

    /**
     * Main - Display all the posts & the linked images
     * @uses \App\Table\PostTable
     * @uses \App\Table\OptionTable
     * @uses \App\Table\OptionsImageTable
     */
    public function index() {
        $posts = $this->Post->last();
        $options = $this->Option->all();
        $optionImage = $this->OptionsImage->find($options[10]->value);
        $this->render('posts.index', compact('posts',  'options', 'optionImage'));

    }

    /**
     * Display single post and the linked image & Manage posts comments
     * @uses DateTime
     * @uses \App\Table\PostTable
     * @uses \App\Table\CommentTable
     * @uses \App\Table\PostsImageTable
     * @return mixed
     * @throws \Exception
     */
    public function single() {
        $date = new DateTime(null, new DateTimeZone('Europe/Paris'));
        $post = $this->Post->find($_GET['id']);
        $comments = $this->Comment->lastByStory($_GET['id']);
        $postImage = $this->PostsImage->find($post->image_id);
        $form = new BootstrapForm();

        if (!empty($_POST['content'])) {
            $this->Comment->newComment($_POST['content'], $_SESSION['auth'], $_GET['id'], '2', $date->format('Y-m-d H:i:s'));
            unset($_POST);
            return $this->single();
        }
        $this->render('posts.single', compact('post', 'comments', 'form', 'postImage'));
    }

    /**
     * Let signal a comment by users
     * @uses \App\Table\CommentTable
     */
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
