<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

/**
 * Class CommentsController
 * @package App\Controller\Admin
 */
class CommentsController extends AppController {

    /**
     * CommentsController constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->loadModel('Comment');
    }

    /**
     * Manage the admin page of the comments
     * @uses \App\Table\CommentTable
     */
    public function index() {
        $comments = $this->Comment->comAlert();
        $allComments = $this->Comment->last();
        $this->render('admin.comments.index', compact('comments', 'allComments'));
    }

    /**
     * Let the Admin Delete
     * @uses \App\Table\CommentTable
     */
    public function delete() {
        if (!empty($_POST)) {
            $result = $this->Comment->delete($_POST['id']);
            return $this->index();
        }
    }

    /**
     * Let the Admin to valid a signaled comment
     * @uses \App\Table\CommentTable
     */
    public function valid() {
        if (!empty($_POST)) {
            $result = $this->Comment->update($_POST['id'], [
                'alert_id'     => '2'
            ]);

            if ($result) {
                return $this->index();
            }
        }
    }

}
