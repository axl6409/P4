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
     * Display all comments on Admin
     * and display comments with an alert status to 1
     * @uses \App\Table\CommentTable
     */
    public function index() {
        $comments = $this->Comment->comAlert();
        $allComments = $this->Comment->last();
        $this->render('admin.comments.index', compact('comments', 'allComments'));
    }

    /**
     * Let delete a comment
     * @uses \App\Table\CommentTable
     */
    public function delete() {

        if (!empty($_POST)) {
            $result = $this->Comment->delete($_POST['id']);
            return $this->index();
        }
    }

    /**
     * Let validate a comment on Admin by update alert status id
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
