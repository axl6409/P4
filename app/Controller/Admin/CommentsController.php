<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class CommentsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Comment');
    }

    public function index() {
        $comments = $this->Comment->comAlert();
        $this->render('admin.comments.index', compact('comments'));
    }

    public function delete() {

        if (!empty($_POST)) {
            $result = $this->Comment->delete($_POST['id']);
            return $this->index();
        }
    }

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
